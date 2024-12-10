<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Mockery\Mockery;

use Ghostwriter\Revamp\AbstractRevampRector;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Override;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Use_;
use PHPUnit\Framework\TestCase;
use Rector\PhpParser\Node\CustomNode\FileWithoutNamespace;
use Tests\Unit\Rule\Mockery\ExtendMockeryTestCaseRectorTest;
use Throwable;

/**
 * @see ExtendMockeryTestCaseRectorTest
 */
final class ExtendMockeryTestCaseRector extends AbstractRevampRector
{
    private array $refactorResult = [];

    /**
     * @return array<class-string<Class_>>
     */
    #[Override]
    public function getNodeTypes(): array
    {
        return [Use_::class, Class_::class, Namespace_::class, FileWithoutNamespace::class];
    }

    /**
     * @param Class_ $node
     */
    public function nodeId(Node $node): string
    {
        return \spl_object_hash($node);
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function refactor(Node $node): null|array|int|Node
    {
        $id = $this->nodeId($node);

        if (\array_key_exists($id, $this->refactorResult)) {
            return $this->refactorResult[$id];
        }

        return match (true) {
            $node instanceof FileWithoutNamespace,
            $node instanceof Namespace_ => $this->refactorNamespace($node),
            default => null,
        };
    }

    /**
     * @throws Throwable
     */
    private function refactorClass(Class_ $class): ?Class_
    {
        if ($this->isSubclassOfMockeryTestCase($class)) {
            return null;
        }

        if (! $this->isPHPUnitTestCase($class)) {
            return null;
        }

        $class->extends = $this->importName(MockeryTestCase::class);

        //        $this->refactorResult[$this->nodeId($class)] = $class;

        return $class;
    }

    /**
     * @throws Throwable
     */
    private function refactorNamespace(FileWithoutNamespace|Namespace_ $node): FileWithoutNamespace|Namespace_
    {
        $useTestCaseStatement = [];

        $classStatement = [];

        foreach ($node->stmts as $stmt) {
            if ($stmt instanceof Use_) {
                if (! $this->isName($stmt, TestCase::class)) {
                    continue;
                }
                $useTestCaseStatement[$this->nodeId($stmt)] = $stmt;
            }

            if (! $stmt instanceof Class_) {
                continue;
            }

            $extends = $stmt->extends;

            if ($extends === null) {
                continue;
            }

            if (! $this->nodeNameResolver->isName($extends, TestCase::class)) {
                continue;
            }

            if ($this->hasTrait($stmt, MockeryPHPUnitIntegration::class)) {
                continue;
            }

            if ($this->nodeNameResolver->isName($extends, MockeryTestCase::class)) {
                continue;
            }

            //            if ($this->isSubclassOfMockeryTestCase($stmt)) {
            //                continue;
            //            }

            if (! $this->isPHPUnitTestCase($stmt)) {
                continue;
            }
            if (
                ! $this->hasMockeryMockStaticCall($stmt)
                && ! $this->hasMockeryGlobalMockFunctionCall($stmt)
            ) {
                continue;
            }

            $classStatement[$this->nodeId($stmt)] = $stmt;
        }

        if ($classStatement === []) {
            return $node;
        }

        foreach ($classStatement as $id => $stmt) {
            $this->refactorResult[$id] = $this->refactorClass($stmt);
        }

        foreach ($useTestCaseStatement as $id => $stmt) {
            $this->refactorResult[$id] = self::REMOVE_NODE;
        }

        return $node;
    }

    /**
     * @throws Throwable
     */
    private function refactorNamespace1(Namespace_ $namespace): ?Namespace_
    {
        foreach ($namespace->stmts as $stmtKey => $stmt) {
            if ($stmt instanceof Use_) {
                $this->refactorUse($stmt, $namespace, $stmtKey);
            }

            if (! $stmt instanceof Class_) {
                continue;
            }

            //            $namespace->stmts[$stmtKey] = $this->refactorClass($stmt);
        }

        return $namespace;
    }

    /**
     * @throws Throwable
     */
    private function refactorUse(Use_ $use, FileWithoutNamespace|Namespace_ $parent, int $key): void
    {
        foreach ($use->uses as $usesKey => $useUse) {
            if (! $this->isName($useUse, TestCase::class)) {
                continue;
            }

            unset($use->uses[$usesKey]);
        }

        if ($use->uses !== []) {
            return;
        }

        unset($parent->stmts[$key]);
    }
}
