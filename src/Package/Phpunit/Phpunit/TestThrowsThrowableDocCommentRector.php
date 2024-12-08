<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Phpunit\Phpunit;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use PhpParser\Node\Stmt\ClassMethod;
use Tests\Unit\Package\Phpunit\Phpunit\TestThrowsThrowableDocCommentRectorTest;
use Throwable;

/**
 * @see TestThrowsThrowableDocCommentRectorTest
 */
final class TestThrowsThrowableDocCommentRector extends AbstractRevampRector
{
    /**
     * @return array<class-string<ClassMethod>>
     */
    #[Override]
    public function getNodeTypes(): array
    {
        return [ClassMethod::class];
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return match (true) {
            $node instanceof ClassMethod => $this->refactorClassMethod($node),
            default => null,
        };
    }

    /**
     * @throws Throwable
     */
    private function refactorClassMethod(ClassMethod $classMethod): ?ClassMethod
    {
        return match (true) {
            $this->isPHPUnitTestClassMethod($classMethod) => $this->addThrowsThrowableDocComment($classMethod),
            default => null,
        };
    }
}
