<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Ghostwriter\Http;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampHttpRectorTest
 */
final class RevampHttpRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
