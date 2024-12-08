<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php85;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php85\Php85RectorTest;

/**
 * @see Php85RectorTest
 */
final class Php85Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
