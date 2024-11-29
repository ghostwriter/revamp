<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Mockery;

use Ghostwriter\Revamp\AbstractRevampRector;
use Ghostwriter\RevampTests\Rule\Mockery\UseMockeryPHPUnitIntegrationTraitRectorTest;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;

/**
 * @see UseMockeryPHPUnitIntegrationTraitRectorTest
 */
final class UseMockeryPHPUnitIntegrationTraitRector extends AbstractRevampRector
{
    /**
     * @return array<class-string<Class_>>
     */
    #[\Override]
    public function getNodeTypes(): array
    {
        return [Class_::class];
    }

    /**
     * @throws \Throwable
     */
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return match (true) {
            $node instanceof Class_ => $this->refactorClass($node),
            default => null,
        };
    }

    /**
     * @throws \Throwable
     */
    private function refactorClass(Class_ $class): ?Class_
    {
        if (! $this->needsMockeryPHPUnitIntegrationTrait($class)) {
            return null;
        }

        return $this->addMockeryPHPUnitIntegrationTrait($class);
    }
}
