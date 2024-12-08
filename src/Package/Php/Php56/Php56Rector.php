<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php56;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php56\Php56RectorTest;

/**
 * @see Php56RectorTest
 */
final class Php56Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
