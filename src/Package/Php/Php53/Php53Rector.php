<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php53;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php53\Php53RectorTest;

/**
 * @see Php53RectorTest
 */
final class Php53Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
