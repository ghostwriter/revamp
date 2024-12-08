<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php83;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php83\Php83RectorTest;

/**
 * @see Php83RectorTest
 */
final class Php83Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
