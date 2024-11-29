<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Psr\Container;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampContainerRectorTest
 */
final class RevampContainerRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
