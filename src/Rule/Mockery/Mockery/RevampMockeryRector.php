<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Mockery\Mockery;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampMockeryRectorTest
 */
final class RevampMockeryRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
