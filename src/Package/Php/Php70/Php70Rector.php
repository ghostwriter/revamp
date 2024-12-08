<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php70;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php70\Php70RectorTest;

/**
 * @see Php70RectorTest
 */
final class Php70Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
