<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\CodingStandard;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\CodingStandard\CodingStandardRectorTest;

/**
 * @see CodingStandardRectorTest
 */
final class CodingStandardRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
