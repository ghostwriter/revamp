<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHPUnit\PHPUnit;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHPUnitRectorTest
 */
final class RevampPHPUnitRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
