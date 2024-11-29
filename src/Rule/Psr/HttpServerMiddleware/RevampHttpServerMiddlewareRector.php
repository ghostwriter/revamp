<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Psr\HttpServerMiddleware;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampHttpServerMiddlewareRectorTest
 */
final class RevampHttpServerMiddlewareRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
