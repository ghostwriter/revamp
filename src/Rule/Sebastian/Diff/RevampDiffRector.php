<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Sebastian\Diff;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampDiffRectorTest
 */
final class RevampDiffRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
