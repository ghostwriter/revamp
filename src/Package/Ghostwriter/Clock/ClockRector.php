<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Clock;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Clock\ClockRectorTest;

/**
 * @see ClockRectorTest
 */
final class ClockRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
