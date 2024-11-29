<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Psr\HttpMessage;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampHttpMessageRectorTest
 */
final class RevampHttpMessageRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
