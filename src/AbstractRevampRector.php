<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use PhpParser\Comment\Doc;
use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\FunctionLike;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\GroupUse;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\TraitUse;
use PhpParser\Node\Stmt\Use_;
use PhpParser\NodeTraverser;
use PhpParser\PrettyPrinter\Standard;
use PHPStan\BetterReflection\Reflection\Adapter\ReflectionEnum;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Type\ObjectType;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory;
use Rector\CodingStyle\Application\UseImportsAdder;
use Rector\CodingStyle\ClassNameImport\ClassNameImportSkipper;
use Rector\CodingStyle\Node\NameImporter;
use Rector\Comments\NodeDocBlock\DocBlockUpdater;
use Rector\Naming\Naming\AliasNameResolver;
use Rector\Naming\Naming\UseImportsResolver;
use Rector\NodeTypeResolver\PhpDoc\NodeAnalyzer\DocBlockNameImporter;
use Rector\Php80\NodeAnalyzer\PhpAttributeAnalyzer;
use Rector\Php80\NodeFactory\NestedAttrGroupsFactory;
use Rector\PhpDocParser\NodeTraverser\SimpleCallableNodeTraverser;
use Rector\PhpParser\Node\BetterNodeFinder;
use Rector\PHPUnit\NodeAnalyzer\TestsNodeAnalyzer;
use Rector\PostRector\Collector\UseNodesToAddCollector;
use Rector\Rector\AbstractRector;
use Rector\Reflection\ReflectionResolver;
use Rector\ValueObject\Application\File;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Throwable;

abstract class AbstractRevampRector extends AbstractRector
{
    /**
     * Remove a node that occurs in an array.
     */
    final public const REMOVE_NODE = NodeTraverser::REMOVE_NODE;

    /**
     * Stop traversing the current node.
     */
    final public const STOP_TRAVERSAL = NodeTraverser::STOP_TRAVERSAL;

    final public function __construct(
        public readonly AliasNameResolver $aliasNameResolver,
        public readonly BetterNodeFinder $betterNodeFinder,
        public readonly ClassNameImportSkipper $classNameImportSkipper,
        public readonly DocBlockNameImporter $docBlockNameImporter,
        public readonly DocBlockUpdater $docBlockUpdater,
        public readonly NameImporter $nameImporter,
        public readonly NestedAttrGroupsFactory $nestedAttrGroupsFactory,
        public readonly PhpAttributeAnalyzer $phpAttributeAnalyzer,
        public readonly PhpDocInfoFactory $phpDocInfoFactory,
        public readonly ReflectionResolver $reflectionResolver,
        public readonly SimpleCallableNodeTraverser $simpleCallableNodeTraverser,
        public readonly Standard $standard,
        public readonly TestsNodeAnalyzer $testsNodeAnalyzer,
        public readonly UseImportsAdder $useImportsAdder,
        public readonly UseImportsResolver $useImportsResolver,
        public readonly UseNodesToAddCollector $useNodesToAddCollector,
        public readonly UseStatements $useStatements,
    ) {
    }

    /**
     * @throws \Throwable
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
        return $this->addThrowsDocComment($classMethod, \Throwable::class);
    }

    /**
     * @throws \Throwable
     */
    final public function addTraitUse(Class_ $node, string $class): void
    {
        $this->addTraitUseToClass($node, $class);
    }

    /**
     * @throws \Throwable
     */
    final public function addTraitUseToClass(Class_ $class, string $fullyQualifiedClassName): void
    {
        \array_unshift($class->stmts, new TraitUse([$this->importName($fullyQualifiedClassName)]));
    }

    /**
     * @throws \Throwable
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
    #[\Override]
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

    final public function hasInterface(Class_ $class, string $interfaceName): bool
    {
        foreach ($class->implements as $interface) {
            if (! $this->nodeNameResolver->isName($interface, $interfaceName)) {
                continue;
            }

            return true;
        }

        return false;
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

    final public function hasTrait(Class_ $class, string $desiredTrait): bool
    {
        foreach ($class->getTraitUses() as $traitUse) {
            foreach ($traitUse->traits as $traitName) {
                if (! $this->nodeNameResolver->isName($traitName, $desiredTrait)) {
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
     * @throws \Throwable
     *
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

    final public function isAbstract(Class_ $class): bool
    {
        $classReflection = $this->reflectionResolver->resolveClassReflection($class);
        if (! $classReflection instanceof ClassReflection) {
            return false;
        }

        return $classReflection->isAbstract();
    }

    final public function isFinalByKeyword(Class_ $class): bool
    {
        $classReflection = $this->reflectionResolver->resolveClassReflection($class);
        if (! $classReflection instanceof ClassReflection) {
            return false;
        }

        return $classReflection->isFinalByKeyword();
    }

    final public function isPHPUnitTestCase(Class_ $class): bool
    {
        return $this->isObjectType($class, new ObjectType(TestCase::class));
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
            // has #[\PHPUnit\Framework\Attributes\Test] attribute
            $this->hasPhpAttributes($classMethod, Test::class) => true,
            default => false,
        };
    }

    final public function isSubclassOf(Class_ $node, string $class): bool
    {
        $classReflection = $this->reflectionResolver->resolveClassReflection($node);

        if (! $classReflection instanceof ClassReflection) {
            return false;
        }

        return $classReflection->isSubclassOf($class);
    }

    final public function isSubclassOfMockeryPHPUnitTestCase(Class_ $class): bool
    {
        return $this->isSubclassOf($class, MockeryTestCase::class);
    }

    final public function isSubclassOfPHPUnitTestCase(Class_ $class): bool
    {
        return $this->isSubclassOf($class, TestCase::class);
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
     * @throws \Throwable
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

    #[\Override]
    public function refactor(Node $node): ?Node
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

    /**
     * @param Stmt[] $stmts
     *
     * @throws \Throwable
     *
     * @return Stmt[]
     *
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
     * @template T of object
     *
     * @param list<class-string<T>> $removedUseStatements
     */
    final public function removeUseStatements(string ...$removedUseStatements): void
    {
        $this->traverseFile(
            function (Node $node) use ($removedUseStatements): ?int {
                if (! $node instanceof Use_) {
                    return null;
                }

                //                $node->setAttribute('origNode', null);
                //                dump([$node::class, count($node->uses)]);

                foreach ($node->uses as $usesKey => $useUse) {
                    \dump([$usesKey, $this->getName($useUse)]);

                    foreach ($removedUseStatements as $removedUseStatement) {
                        if (! $this->isName($useUse, $removedUseStatement)) {
                            continue;
                        }

                        unset($node->uses[$usesKey]);
                        continue 2;
                    }
                }

                \dump([$node::class, \count($node->uses)]);

                return $node->uses === [] ? self::REMOVE_NODE : null;
            }
        );
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
     * @param callable(Node):(null|int|list<Node>|Node) $callback
     */
    final public function traverseFile(callable $callback): void
    {
        $this->simpleCallableNodeTraverser
            ->traverseNodesWithCallable($this->file->getNewStmts(), $callback);
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
