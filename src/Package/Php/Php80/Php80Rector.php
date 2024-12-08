<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php80;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php80\Php80RectorTest;

/**
 * @see Php80RectorTest
 */
final class Php80Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
