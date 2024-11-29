<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Sebastian\Comparator;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampComparatorRectorTest
 */
final class RevampComparatorRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
