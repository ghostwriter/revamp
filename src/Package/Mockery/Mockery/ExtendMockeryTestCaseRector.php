<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Mockery\Mockery;

use Ghostwriter\Revamp\AbstractRevampRector;
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
    /**
     * @return array<class-string<Class_>>
     */
    #[Override]
    public function getNodeTypes(): array
    {
        return [Class_::class, Namespace_::class, FileWithoutNamespace::class];
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return match (true) {
            $node instanceof Class_ => $this->isPHPUnitTestCase($node) ? $this->refactorClass($node) : null,
            $node instanceof FileWithoutNamespace => $this->refactorFileWithoutNamespace($node),
            $node instanceof Namespace_ => $this->refactorNamespace($node),
            default => null,
        };
    }

    /**
     * @throws Throwable
     */
    private function refactorClass(Class_ $class): ?Class_
    {
        $class->extends = $this->importName(MockeryTestCase::class);

        return $class;
    }

    /**
     * @throws Throwable
     */
    private function refactorFileWithoutNamespace(FileWithoutNamespace $fileWithoutNamespace): FileWithoutNamespace
    {
        foreach ($fileWithoutNamespace->stmts as $stmtKey => $stmt) {
            if ($stmt instanceof Use_) {
                $this->refactorUse($stmt, $fileWithoutNamespace, $stmtKey);
            }
        }

        return $fileWithoutNamespace;
    }

    /**
     * @throws Throwable
     */
    private function refactorNamespace(Namespace_ $namespace): ?Namespace_
    {
        foreach ($namespace->stmts as $stmtKey => $stmt) {
            if (! $stmt instanceof Use_) {
                continue;
            }

            $this->refactorUse($stmt, $namespace, $stmtKey);
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
