<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Psr\Cache;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampCacheRectorTest
 */
final class RevampCacheRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
