<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Ghostwriter\CodingStandard;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampCodingStandardRectorTest
 */
final class RevampCodingStandardRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
