<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Mockery;

use Ghostwriter\Revamp\AbstractRevampRector;
use Ghostwriter\RevampTests\Rule\Mockery\ProphecyToMockeryRectorTest;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;

/**
 * @see ProphecyToMockeryRectorTest
 */
final class ProphecyToMockeryRector extends AbstractRevampRector
{
    /**
     * @param Class_ $node
     */
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
