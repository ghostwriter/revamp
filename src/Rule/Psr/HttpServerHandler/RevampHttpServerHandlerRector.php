<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Psr\HttpServerHandler;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampHttpServerHandlerRectorTest
 */
final class RevampHttpServerHandlerRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
