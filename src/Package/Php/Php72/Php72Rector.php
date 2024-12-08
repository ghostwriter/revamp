<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php72;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php72\Php72RectorTest;

/**
 * @see Php72RectorTest
 */
final class Php72Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
