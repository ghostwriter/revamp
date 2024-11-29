<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Ghostwriter\Json;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampJsonRectorTest
 */
final class RevampJsonRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
