<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php73;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php73\Php73RectorTest;

/**
 * @see Php73RectorTest
 */
final class Php73Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
