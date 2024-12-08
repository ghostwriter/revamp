<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php74;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php74\Php74RectorTest;

/**
 * @see Php74RectorTest
 */
final class Php74Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
