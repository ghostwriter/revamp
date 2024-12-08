<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\EventDispatcher;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\EventDispatcher\EventDispatcherRectorTest;

/**
 * @see EventDispatcherRectorTest
 */
final class EventDispatcherRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
