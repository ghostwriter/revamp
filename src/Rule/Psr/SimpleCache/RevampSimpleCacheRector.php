<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Psr\SimpleCache;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampSimpleCacheRectorTest
 */
final class RevampSimpleCacheRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
