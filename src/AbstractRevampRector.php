<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp;

use Closure;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Override;
use PhpParser\Comment\Doc;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\FunctionLike;
use PhpParser\Node\InterpolatedStringPart;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Param;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\GroupUse;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\TraitUse;
use PhpParser\Node\Stmt\Use_;
use PhpParser\NodeVisitor;
use PhpParser\PrettyPrinter\Standard;
use PHPStan\BetterReflection\Reflection\Adapter\ReflectionEnum;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Rector\Application\ChangedNodeScopeRefresher;
use Rector\Application\Provider\CurrentFileProvider;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory;
use Rector\CodingStyle\Application\UseImportsAdder;
use Rector\CodingStyle\Application\UseImportsRemover;
use Rector\CodingStyle\ClassNameImport\ClassNameImportSkipper;
use Rector\CodingStyle\Node\NameImporter;
use Rector\Comments\NodeDocBlock\DocBlockUpdater;
use Rector\Naming\Naming\AliasNameResolver;
use Rector\Naming\Naming\UseImportsResolver;
use Rector\NodeNameResolver\NodeNameResolver;
use Rector\NodeTypeResolver\NodeTypeResolver;
use Rector\NodeTypeResolver\PhpDoc\NodeAnalyzer\DocBlockNameImporter;
use Rector\Php80\NodeAnalyzer\PhpAttributeAnalyzer;
use Rector\Php80\NodeFactory\NestedAttrGroupsFactory;
use Rector\PhpDocParser\NodeTraverser\SimpleCallableNodeTraverser;
use Rector\PhpParser\Comparing\NodeComparator;
use Rector\PhpParser\Node\BetterNodeFinder;
use Rector\PhpParser\Node\CustomNode\FileWithoutNamespace;
use Rector\PhpParser\Node\NodeFactory;
use Rector\PhpParser\Node\Value\ValueResolver;
use Rector\PostRector\Collector\UseNodesToAddCollector;
use Rector\Rector\AbstractRector;
use Rector\Reflection\ReflectionResolver;
use Rector\Skipper\Skipper\Skipper;
use Rector\ValueObject\Application\File;
use ReflectionProperty;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Throwable;

abstract class AbstractRevampRector extends AbstractRector
{
    /**
     * Remove the current node.
     */
    final public const int REMOVE_NODE = NodeVisitor::REMOVE_NODE;

    /**
     * Stop traversing the current node.
     */
    final public const int STOP_TRAVERSAL = NodeVisitor::STOP_TRAVERSAL;

    public const string ORIGINAL_NODE = 'origNode';

    protected File $file;

    protected NodeComparator $nodeComparator;

    protected NodeFactory $nodeFactory;

    protected NodeNameResolver $nodeNameResolver;

    protected NodeTypeResolver $nodeTypeResolver;

    protected Skipper $skipper;

    final public function __construct(
        public readonly AliasNameResolver $aliasNameResolver,
        public readonly BetterNodeFinder $betterNodeFinder,
        public readonly ClassNameImportSkipper $classNameImportSkipper,
        public readonly CurrentFileProvider $currentFileProvider,
        public readonly ChangedNodeScopeRefresher $changedNodeScopeRefresher,
        public readonly DocBlockNameImporter $docBlockNameImporter,
        public readonly DocBlockUpdater $docBlockUpdater,
        public readonly NameImporter $nameImporter,
        public readonly UseImportsRemover $useImportsRemover,
        public readonly NestedAttrGroupsFactory $nestedAttrGroupsFactory,
        public readonly PhpAttributeAnalyzer $phpAttributeAnalyzer,
        public readonly PhpDocInfoFactory $phpDocInfoFactory,
        public readonly ReflectionResolver $reflectionResolver,
        public readonly SimpleCallableNodeTraverser $simpleCallableNodeTraverser,
        public readonly Standard $standard,
        public readonly UseImportsAdder $useImportsAdder,
        public readonly UseImportsResolver $useImportsResolver,
        public readonly UseNodesToAddCollector $useNodesToAddCollector,
        public readonly UseStatements $useStatements,
        public readonly ValueResolver $valueResolver,
    ) {
    }

    final public function addArrayItemByKey(Array_ $array, ArrayItem $newArrayItem, string $key): void
    {
        foreach ($array->items as $item) {
            if (! $item instanceof ArrayItem) {
                continue;
            }

            if ($this->hasKeyName($item, $key)) {
                if (! $item->value instanceof Array_) {
                    continue;
                }

                $item->value->items[] = $newArrayItem;
                return;
            }
        }

        $array->items[] = new ArrayItem(new Array_([$newArrayItem]), new String_($key));
    }

    /**
     * @throws Throwable
     */
    final public function addMockeryPHPUnitIntegrationTrait(Class_ $class): Class_
    {
        foreach ($class->stmts as $key => $classMethod) {
            if (! $classMethod instanceof ClassMethod) {
                continue;
            }

            if (! $this->isName($classMethod, 'tearDown')) {
                continue;
            }

            $stmtsCount = \count($classMethod->stmts);
            if ($stmtsCount > 2) {
                continue;
            }

            if (! $this->hasMockeryCloseStaticCall($classMethod)) {
                continue;
            }

            if ($stmtsCount === 2 && ! $this->hasParentTearDownStaticCall($classMethod)) {
                continue;
            }

            unset($class->stmts[$key]);
        }

        $this->addTraitUse($class, MockeryPHPUnitIntegration::class);

        return $class;
    }

    public function addThrowsDocComment(FunctionLike $functionLike, string $fullyQualifiedClassName): ?FunctionLike
    {
        // Import the Throwable class
        $throwable = $this->importName($fullyQualifiedClassName);

        // Get the existing doc comment
        $docComment = $functionLike->getDocComment();

        // If there is a doc comment
        if ($docComment instanceof Doc) {

            // Todo: check if it already has a `@throws` tag with the $throwable class
            if (
                $this->phpDocInfoFactory
                    ->createFromNodeOrEmpty($functionLike)
                    ->hasByName('throws')
            ) {
                return null;
            }

            // Split the doc comment into lines
            $docLines = \explode("\n", $docComment->getText());

            // Insert @throws before the last `*/` of the docblock
            $lastLine = \array_pop($docLines);

            $docLines[] = ' *';
            $docLines[] = ' * @throws ' . $throwable;
            $docLines[] = $lastLine;
        } else {
            // If there is no doc comment, add one
            $docLines = ['/**', ' * @throws ' . $throwable, ' */'];
        }

        // Reconstruct the doc comment
        $newDocContent = \implode("\n", $docLines);

        // Set the new doc comment
        $functionLike->setDocComment(new Doc($newDocContent));

        return $functionLike;
    }

    public function addThrowsThrowableDocComment(ClassMethod $classMethod): ?ClassMethod
    {
        return $this->addThrowsDocComment($classMethod, Throwable::class);
    }

    /**
     * @throws Throwable
     */
    final public function addTraitUse(Class_ $node, string $class): void
    {
        $this->addTraitUseToClass($node, $class);
    }

    /**
     * @throws Throwable
     */
    final public function addTraitUseToClass(Class_ $class, string $fullyQualifiedClassName): void
    {
        \array_unshift($class->stmts, new TraitUse([$this->importName($fullyQualifiedClassName)]));
    }

    final public function changeFileContent(string $newContent): array
    {
        $file = $this->currentFileProvider->getFile();

        //        $newContent = $this->betterStandardPrinter->printFormatPreserving(
        //            $file->getNewStmts(),
        //            $file->getOldStmts(),
        //            $file->getOldTokens()
        //        );
        $file->changeFileContent($newContent);

        return $this->useNodesToAddCollector->getFunctionImportsByFilePath($this->file->getFilePath());
    }

    /**
     * @throws Throwable
     */
    final public function currentFile(): File
    {
        return $this->file;
    }

    final public function extend(Class_ $node, string $class): void
    {
        $node->extends = $this->importName($class);
    }

    final public function extendsClass(Class_ $class, string $parentClassName): bool
    {
        if (! $class->extends instanceof Name) {
            return false;
        }

        return $this->isSubclassOf($class, $parentClassName);
        // return $this->nodeNameResolver->isName($class->extends, $parentClassName);
    }

    /**
     * @return array<class-string<Node>>
     */
    #[Override]
    public function getNodeTypes(): array
    {
        return [];
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(\sprintf('Rector Rule: %d.', static::class), [
            new CodeSample(
                badCode: <<<'CODE_SAMPLE'
                    // @todo fill code before
                    CODE_SAMPLE
                ,
                goodCode: <<<'CODE_SAMPLE'
                    // @todo fill code after
                    CODE_SAMPLE
            ),
        ]);
    }

    /**
     * @param Arg|Expr|InterpolatedStringPart $node
     *
     * @throws Throwable
     */
    final public function getValue(Node $node): mixed
    {
        return $this->valueResolver->getValue($node);
    }

    final public function hasAttribute(Class_|ClassLike|ClassMethod|Param|Property $node, string $attributeName): bool
    {
        foreach ($node->attrGroups as $attrGroup) {
            foreach ($attrGroup->attrs as $attr) {
                if (! $this->nodeNameResolver->isName($attr->name, $attributeName)) {
                    continue;
                }

                return true;
            }
        }

        return false;
    }

    final public function hasClassParentClassMethod(Class_ $class, string $methodName): bool
    {
        $classReflection = $this->reflectionResolver->resolveClassReflection($class);

        if (! $classReflection instanceof ClassReflection) {
            return false;
        }

        foreach ($classReflection->getParents() as $parentClassReflection) {
            if ($parentClassReflection->hasMethod($methodName)) {
                return true;
            }
        }

        return false;
    }

    final public function hasConstant(Class_ $class, string $constantName): bool
    {
        foreach ($class->getConstants() as $classConst) {
            if (! $this->nodeNameResolver->isName($classConst, $constantName)) {
                continue;
            }

            return true;
        }

        return false;
    }

    final public function hasImplements(Class_ $class, string ...$interfaceFQNS): bool
    {
        foreach ($class->implements as $implement) {
            if ($this->nodeNameResolver->isNames($implement, $interfaceFQNS)) {
                return true;
            }
        }

        return false;
    }

    final public function hasKeyName(ArrayItem $arrayItem, string $name): bool
    {
        if (! $arrayItem->key instanceof String_) {
            return false;
        }

        return $arrayItem->key->value === $name;
    }

    final public function hasMethod(Class_ $class, string $methodName): bool
    {
        foreach ($class->getMethods() as $classMethod) {
            if (! $this->nodeNameResolver->isName($classMethod->name, $methodName)) {
                continue;
            }

            return true;
        }

        return false;
    }

    final public function hasMethodParameter(ClassMethod $classMethod, string $name): bool
    {
        foreach ($classMethod->params as $param) {
            if ($this->nodeNameResolver->isName($param->var, $name)) {
                return true;
            }
        }

        return false;
    }

    final public function hasMockeryCloseAndParentTearDown(ClassMethod $classMethod): bool
    {
        return $this->hasMockeryCloseStaticCall($classMethod) && $this->hasParentTearDownStaticCall($classMethod);
    }

    final public function hasMockeryCloseStaticCall(ClassMethod $classMethod): bool
    {
        return $this->betterNodeFinder->findFirst($classMethod, function (Node $node): bool {
            if (! $node instanceof StaticCall) {
                return false;
            }

            if (! $this->isName($node->class, 'Mockery')) {
                return false;
            }

            return $this->isName($node->name, 'close');
        }) instanceof Node;
    }

    final public function hasMockeryGlobalMockFunctionCall(Class_ $class): bool
    {
        return $this->betterNodeFinder->findFirst($class, function (Node $node): bool {
            if (! $node instanceof FuncCall) {
                return false;
            }

            return $this->isName($node->name, 'mock');
        }) instanceof Node;
    }

    final public function hasMockeryMockStaticCall(Class_ $class): bool
    {
        return $this->betterNodeFinder->findFirst($class, function (Node $node): bool {
            if (! $node instanceof StaticCall) {
                return false;
            }

            if (! $this->isName($node->class, 'Mockery')) {
                return false;
            }

            return $this->isName($node->name, 'mock');
        }) instanceof Node;
    }

    final public function hasMockeryPHPUnitIntegrationTrait(Class_ $class): bool
    {
        //        $classReflection = $this->reflectionResolver->resolveClassReflection($node);
        //
        //        if (! $classReflection instanceof ClassReflection) {
        //            return false;
        //        }
        //
        //        return $classReflection->hasTraitUse(MockeryPHPUnitIntegration::class);
        return $this->hasTrait($class, MockeryPHPUnitIntegration::class);
    }

    final public function hasParentTearDownStaticCall(ClassMethod $classMethod): bool
    {
        return $this->betterNodeFinder->findFirst($classMethod, function (Node $node): bool {
            if (! $node instanceof StaticCall) {
                return false;
            }

            if (! $this->isName($node->class, 'parent')) {
                return false;
            }

            return $this->isName($node->name, 'tearDown');
        }) instanceof Node;
    }

    final public function hasPhpAnnotations(ClassMethod $classMethod, string ...$tags): bool
    {
        foreach ($tags as $tag) {
            if ($this->phpDocInfoFactory->createFromNodeOrEmpty($classMethod)->hasByName($tag)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param class-string ...$attributeClasses
     */
    final public function hasPhpAttributes(
        ClassLike|FunctionLike|Param|Property $node,
        string ...$attributeClasses
    ): bool {
        foreach ($attributeClasses as $attributeClass) {
            foreach ($node->attrGroups as $attrGroup) {
                foreach ($attrGroup->attrs as $attribute) {
                    if (! $this->nodeNameResolver->isName($attribute->name, $attributeClass)) {
                        continue;
                    }

                    return true;
                }
            }
        }

        return false;
    }

    final public function hasProperty(Class_ $class, string $propertyName): bool
    {
        foreach ($class->getProperties() as $property) {
            if (! $this->nodeNameResolver->isName($property->props[0]->name, $propertyName)) {
                continue;
            }

            return true;
        }

        return false;
    }

    final public function hasTestCaseTearDownMockeryCloseWithOptionalParentTearDown(Class_ $class): bool
    {
        return $this->betterNodeFinder->findFirst($class, function (Node $node): bool {
            if (! $node instanceof ClassMethod) {
                return false;
            }

            if (! $this->isName($node->name, 'tearDown')) {
                return false;
            }

            $stmtsCount = \count($node->stmts ?? []);

            if ($stmtsCount === 2) {
                return $this->hasMockeryCloseAndParentTearDown($node);
            }

            return $stmtsCount === 1 ? $this->hasMockeryCloseStaticCall($node) : false;
        }) instanceof Node;
    }

    final public function hasTrait(Class_ $class, string $trait): bool
    {
        foreach ($class->getTraitUses() as $traitUse) {
            foreach ($traitUse->traits as $traitName) {
                if (! $this->nodeNameResolver->isName($traitName, $trait)) {
                    continue;
                }

                return true;
            }
        }

        return false;
    }

    /**
     * @template T of object
     *
     * @param class-string<T>|list<string>|Name|string $fullyQualifiedClassName
     * @param array<GroupUse|Use_>                     $currentUses
     *
     * @throws Throwable
     */
    final public function importName(array|Name|string $fullyQualifiedClassName, array $currentUses = []): ?Name
    {
        $fullyQualified = new FullyQualified($fullyQualifiedClassName);

        if (
            $this->classNameImportSkipper
                ->shouldSkipName($fullyQualified, $this->useImportsResolver->resolve())
        ) {
            return null;
        }

        return $this->nameImporter->importName($fullyQualified, $this->file, $currentUses);
    }

    final public function is(Node $node, string $class): bool
    {
        $classReflection = $this->reflectionResolver->resolveClassReflection($node);

        if (! $classReflection instanceof ClassReflection) {
            return false;
        }

        return $classReflection->is($class);
    }

    final public function isAbstract(Class_ $class): bool
    {
        $classReflection = $this->reflectionResolver->resolveClassReflection($class);
        if (! $classReflection instanceof ClassReflection) {
            return false;
        }

        return $classReflection->isAbstract();
    }

    /**
     * @throws Throwable
     */
    public function isAssertCallLikeName(Node $node, string $name): bool
    {
        if ($node instanceof StaticCall) {
            $callerType = $this->nodeTypeResolver->getType($node->class);
        } elseif ($node instanceof MethodCall) {
            $callerType = $this->nodeTypeResolver->getType($node->var);
        } else {
            return false;
        }

        if (! $this->isObjectTypeSuperTypeOf($callerType, Assert::class)) {
            return false;
        }

        /** @var MethodCall|StaticCall $node */
        return $this->nodeNameResolver->isName($node->name, $name);
    }

    final public function isFinalByKeyword(Class_ $class): bool
    {
        $classReflection = $this->reflectionResolver->resolveClassReflection($class);
        if (! $classReflection instanceof ClassReflection) {
            return false;
        }

        return $classReflection->isFinalByKeyword();
    }

    final public function isMethodStaticCallOrClassMethodObjectType(Node $node, string $class): bool
    {
        return $this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, new ObjectType($class));
    }

    /**
     * @throws Throwable
     */
    public function isObjectTypeSuperTypeOf(Type $type, string $className): bool
    {
        return (new ObjectType($className))
            ->isSuperTypeOf($type)
            ->yes();
    }

    /**
     * @param string[] $names
     */
    public function isPHPUnitMethodCallNames(Node $node, array $names): bool
    {
        if (! $this->isPHPUnitTestCaseCall($node)) {
            return false;
        }

        /** @var MethodCall|StaticCall $node */
        return $this->nodeNameResolver->isNames($node->name, $names);
    }

    final public function isPHPUnitTestCase(Node $class): bool
    {
        return $this->isObjectType($class, new ObjectType(TestCase::class));
    }

    public function isPHPUnitTestCaseCall(Node $node): bool
    {
        if (! $this->isSubclassOf($node, TestCase::class)) {
            return false;
        }

        return $node instanceof MethodCall || $node instanceof StaticCall;
    }

    final public function isPHPUnitTestClassMethod(ClassMethod $classMethod): bool
    {
        if (! $classMethod->isPublic()) {
            return false;
        }

        return match (true) {
            // name starts with 'test'
            $this->nameStartsWith($classMethod, 'test'),
            // has @test annotation
            $this->hasPhpAnnotations($classMethod, 'test'),
            // has #[\PhpUnit\Framework\Attributes\Test] attribute
            $this->hasPhpAttributes($classMethod, Test::class) => true,
            default => false,
        };
    }

    final public function isSubclassOf(Node $node, string $class): bool
    {
        $classReflection = $this->reflectionResolver->resolveClassReflection($node);

        if (! $classReflection instanceof ClassReflection) {
            return false;
        }

        return $classReflection->isSubclassOf($class);
    }

    final public function isSubclassOfMockeryTestCase(Node $node): bool
    {
        return $this->isSubclassOf($node, MockeryTestCase::class);
    }

    final public function isSubclassOfPHPUnitTestCase(Node $node): bool
    {
        return $this->isSubclassOf($node, TestCase::class);
    }

    public function isTestClassMethod(ClassMethod $classMethod): bool
    {
        if (! $classMethod->isPublic()) {
            return false;
        }

        if (\str_starts_with($classMethod->name->toString(), 'test')) {
            return true;
        }

        return $this->phpDocInfoFactory->createFromNodeOrEmpty($classMethod)
            ->hasByName('test');
    }

    final public function mergeFiles(File $existingFile, File $newFile): void
    {
        $existingStmts = $existingFile->getNewStmts();
        /** @var FileWithoutNamespace $fileWithoutNamespace */
        $fileWithoutNamespace = $existingStmts[0];
        // This is very ugly but it works, see https://github.com/nikic/PHP-Parser/issues/1019
        unset($fileWithoutNamespace->stmts[1]);
        $existingArray = $this->getNodeArray($fileWithoutNamespace, 0);
        // --- new php array
        $newStmts = $newFile->getNewStmts();
        /** @var FileWithoutNamespace $fileWithoutNamespace2 */
        $fileWithoutNamespace2 = $newStmts[0];
        $newArray = $this->getNodeArray($fileWithoutNamespace2, 1);
        // Merge the two arrays
        $existingArray->items[] = $newArray->items[0];
        $existingFile->changeNewStmts($existingStmts);
    }

    final public function nameEndsWith(Node $node, string ...$suffixes): bool
    {
        $name = $this->nodeNameResolver->getName($node);

        foreach ($suffixes as $suffix) {
            if (\str_ends_with((string) $name, $suffix)) {
                return true;
            }
        }

        return false;
    }

    final public function nameStartsWith(Node $node, string ...$prefixes): bool
    {
        $name = $this->nodeNameResolver->getName($node);

        foreach ($prefixes as $prefix) {
            if (\str_starts_with((string) $name, $prefix)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @throws Throwable
     */
    final public function needsMockeryPHPUnitIntegrationTrait(Class_ $class): bool
    {
        return match (true) {
            $this->hasMockeryPHPUnitIntegrationTrait($class) => false,

            default => match (true) {
                $this->isPHPUnitTestCase($class) => match (true) {

                    $this->hasMockeryMockStaticCall($class),

                    $this->hasMockeryGlobalMockFunctionCall($class) => true,

                    default => false,
                },

                default => false,
            },
        };
    }

    #[Override]
    public function refactor(Node $node): null|array|int|Node
    {
        return null;
    }

    final public function removeClassMethod(Class_ $class, string $methodName): Class_
    {
        $this->traverseNodes(
            $class->stmts,
            function (Node $node) use ($methodName): ?int {
                if (! $node instanceof ClassMethod) {
                    return null;
                }

                if (! $this->isName($node, $methodName)) {
                    return null;
                }

                return self::REMOVE_NODE;
            }
        );

        return $class;
    }

    final public function removeClassMethodTeardown(Class_ $class): void
    {
        $this->removeClassMethod($class, 'tearDown');
    }

    final public function removeImplements(Class_ $class, string ...$interfaceFQNS): void
    {
        $modified = false;

        foreach ($class->implements as $key => $implement) {
            if (! $this->nodeNameResolver->isNames($implement, $interfaceFQNS)) {
                continue;
            }

            unset($class->implements[$key]);

            $modified = true;
        }

        if (! $modified) {
            return;
        }

        $class->implements = \array_values($class->implements);
    }

    /**
     * @param Stmt[]   $stmts
     * @param string[] $removedUses
     *
     * @return Stmt[]
     */
    final public function removeImportsFromStmts(array $stmts, array $removedUses): array
    {
        foreach ($stmts as $key => $stmt) {
            if (! $stmt instanceof Use_) {
                continue;
            }

            $stmt = $this->removeUseFromUse($removedUses, $stmt);
            if ($stmt->uses !== []) {
                continue;
            }

            //            dump_node($stmt);

            // remove empty uses
            unset($stmts[$key]);
        }

        return $stmts;
    }

    final public function removeNode(Node $node): void
    {
        $originalNode =
            $node->getAttribute(self::ORIGINAL_NODE) ??
            $node;

        $nodeId = \spl_object_id($originalNode);
        ###
        $closure = Closure::bind(
            static fn (
                AbstractRector $self
            ) => $self->nodesToReturn[$nodeId] = NodeVisitor::REMOVE_NODE,
            null,
            AbstractRector::class
        );
        $closure($this);
        ###
        $reflectionProperty = new ReflectionProperty(AbstractRector::class, 'toBeRemovedNodeId');
        $reflectionProperty->setValue($this, $nodeId);
        ###
        $reflectionProperty = new ReflectionProperty(AbstractRector::class, 'nodesToReturn');
        $value = $reflectionProperty->getValue($this);
        $value[$nodeId] = NodeVisitor::REMOVE_NODE;
        $reflectionProperty->setValue($this, $value);
        ###

        \dump([$value]);

        ////                    $orignal = $stmt->getAttribute();
        //        $nodeId = \spl_object_id($stmt);
        //
        //        $this->nodesToReturn[$nodeId] = NodeVisitor::REMOVE_NODE;
    }

    /**
     * @param Stmt[] $stmts
     *
     * @throws Throwable
     *
     * @return Stmt[]
     */
    final public function removeStmts(ClassMethod $classMethod, array &$stmts): array
    {
        foreach ($stmts as $key => $assign) {
            if (! $this->nodeComparator->areNodesEqual($classMethod, $assign)) {
                continue;
            }

            unset($stmts[$key]);
        }

        return $stmts;
    }

    /**
     * @param string[] $removedUses
     */
    final public function removeUseFromUse(array $removedUses, Use_ $use): Use_
    {
        $uses = $use->uses;

        foreach ($uses as $key => $useUse) {
            if (! $this->isNames($useUse, $removedUses)) {
                continue;
            }

            unset($uses[$key]);
        }

        $use->uses = \array_values($uses);

        return $use;
    }

    /**
     * @template T of object
     *
     * @param list<class-string<T>> $removedUseStatements
     */
    final public function removeUseStatements(string ...$removedUseStatements): void
    {
        $this->traverseFile(
            function (Node $node) use ($removedUseStatements) {
                if (
                    (! $node instanceof FileWithoutNamespace) &&
                    (! $node instanceof Namespace_)
                ) {
                    return null;
                }

                $node->stmts = $this->removeImportsFromStmts($node->stmts, $removedUseStatements);

                \dump_node($node);

                return $node;
            }
        );
    }

    /**
     * @template T of object
     *
     */
    final public function replaceUseStatement(Node $node, string $from, string $to): void
    {
        $this->traverseFile(
            function (Node $node) use ($from, $to) {
                if (
                    (! $node instanceof FileWithoutNamespace) &&
                    (! $node instanceof Namespace_)
                ) {
                    return null;
                }

                foreach ($node->stmts as $stmt) {
                    if (! $stmt instanceof Use_) {
                        continue;
                    }

                    foreach ($stmt->uses as $use) {
                        if (! $this->nodeNameResolver->isName($stmt, $from)) {
                            continue;
                        }

                        $use->name = new Name($to);

                        return $node;
                    }
                }

                return null;
            }
        );
    }

    final public function resolveNamespace(): null|FileWithoutNamespace|Namespace_
    {
        /** @var null|File $file */
        $file = $this->currentFileProvider->getFile();

        if (! $file instanceof File) {
            return null;
        }

        $newStmts = $file->getNewStmts();
        if ($newStmts === []) {
            return null;
        }

        /** @var FileWithoutNamespace[]|Namespace_[] $namespaces */
        $namespaces = \array_filter(
            $newStmts,
            static fn (
                Stmt $stmt
            ): bool => $stmt instanceof Namespace_ || $stmt instanceof FileWithoutNamespace,
        );

        // multiple namespaces is not supported
        if (\count($namespaces) !== 1) {
            return null;
        }

        return \current($namespaces);
    }

    final public function resolveParentClassName(Class_ $class): ?string
    {
        $classReflection = $this->reflectionResolver->resolveClassReflection($class);
        if (! $classReflection instanceof ClassReflection) {
            return null;
        }

        $nativeReflection = $classReflection->getNativeReflection();
        if ($nativeReflection instanceof ReflectionEnum) {
            return null;
        }

        return $nativeReflection->getParentClassName();
    }

    /**
     * @return Use_[]
     */
    final public function resolveUses(): array
    {
        $namespace = $this->resolveNamespace();

        if (! $namespace instanceof Node) {
            return [];
        }

        return \array_filter($namespace->stmts, static fn (Stmt $stmt): bool => $stmt instanceof Use_);
    }

    final public function sortImplements(Class_ $class): void
    {
        \usort(
            $class->implements,
            fn (Name $left, Name $right): int =>
                $this->nodeNameResolver->getName($left) <=> $this->nodeNameResolver->getName($right)
        );

        $class->implements = \array_values($class->implements);
    }

    /**
     * @param callable(Node):(null|int|list<Node>|Node) $callback
     */
    final public function traverseFile(callable $callback): void
    {
        $this->traverseNodes($this->file->getNewStmts(), $callback);
    }

    /**
     * @param callable(Node):(null|int|list<Node>|Node) $callback
     * @param list<Node>                                $nodes
     */
    final public function traverseNodes(array $nodes, callable $callback): void
    {
        if ($nodes === []) {
            return;
        }

        $this->simpleCallableNodeTraverser
            ->traverseNodesWithCallable($nodes, $callback);
    }

    final public function unsetArrayItemByKey(Array_ $array, string $keyName): ?ArrayItem
    {
        foreach ($array->items as $i => $arrayItem) {
            if (! $arrayItem instanceof ArrayItem) {
                continue;
            }

            //            if (! $arrayItem->key instanceof String_) {
            //                continue;
            //            }
            //
            //            if ($arrayItem->key->value !== $keyName) {
            //                continue;
            //            }

            if (! $this->hasKeyName($arrayItem, $keyName)) {
                continue;
            }

            $removedArrayItem = $array->items[$i];
            if (! $removedArrayItem instanceof ArrayItem) {
                continue;
            }

            // remove + recount for the printer
            unset($array->items[$i]);

            return $arrayItem;
        }

        return null;
    }

    final public function usesClass(): array
    {
        return $this->useNodesToAddCollector->getObjectImportsByFilePath($this->file->getFilePath());
    }

    final public function usesConstant(): array
    {
        return $this->useNodesToAddCollector->getConstantImportsByFilePath($this->file->getFilePath());
    }

    final public function usesFunction(): array
    {
        return $this->useNodesToAddCollector->getFunctionImportsByFilePath($this->file->getFilePath());
    }
}
