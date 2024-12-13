<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Mockery\Mockery;

use Ghostwriter\Revamp\AbstractRevampRector;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Override;
use PhpParser\Node;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use Tests\Unit\Rule\Mockery\UseMockeryPHPUnitIntegrationTraitRectorTest;
use Throwable;

/**
 * @see UseMockeryPHPUnitIntegrationTraitRectorTest
 */
final class UseMockeryPHPUnitIntegrationTraitRector extends AbstractRevampRector
{
    /**
     * @return array<class-string<Class_>>
     */
    #[Override]
    public function getNodeTypes(): array
    {
        return [Class_::class];
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return match (true) {
            $node instanceof Class_ => $this->refactorClass($node),
            default => null,
        };
    }

    /**
     * @throws Throwable
     */
    private function refactorClass(Class_ $class): ?Class_
    {
        $extends = $class->extends;

        if (! $extends instanceof Name) {
            return null;
        }

        if ($this->nodeNameResolver->isName($extends, MockeryTestCase::class)) {
            return null;
        }

        if ($this->hasTrait($class, MockeryPHPUnitIntegration::class)) {
            return null;
        }

        if (! $this->needsMockeryPHPUnitIntegrationTrait($class)) {
            return null;
        }

        return $this->addMockeryPHPUnitIntegrationTrait($class);
    }
}
