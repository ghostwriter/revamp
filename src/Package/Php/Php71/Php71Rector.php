<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php71;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php71\Php71RectorTest;

/**
 * @see Php71RectorTest
 */
final class Php71Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
