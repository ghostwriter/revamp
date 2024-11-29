<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Mockery;

use Ghostwriter\Revamp\AbstractRevampRector;
use Ghostwriter\RevampTests\Rule\Mockery\PHPUnitToMockeryRectorTest;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;

/**
 * @see PHPUnitToMockeryRectorTest
 */
final class PHPUnitToMockeryRector extends AbstractRevampRector
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
