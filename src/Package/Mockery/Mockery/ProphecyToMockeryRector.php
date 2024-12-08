<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Mockery\Mockery;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use Tests\Unit\Rule\Mockery\ProphecyToMockeryRectorTest;

/**
 * @see ProphecyToMockeryRectorTest
 */
final class ProphecyToMockeryRector extends AbstractRevampRector
{
    /**
     * @param Class_ $node
     */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
