<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Ghostwriter\EventDispatcher;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampEventDispatcherRectorTest
 */
final class RevampEventDispatcherRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
