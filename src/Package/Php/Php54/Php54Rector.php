<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php54;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php54\Php54RectorTest;

/**
 * @see Php54RectorTest
 */
final class Php54Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
