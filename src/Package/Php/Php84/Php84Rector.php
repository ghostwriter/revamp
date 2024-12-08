<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php84;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php84\Php84RectorTest;

/**
 * @see Php84RectorTest
 */
final class Php84Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
