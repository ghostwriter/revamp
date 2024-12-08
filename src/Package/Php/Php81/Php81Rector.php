<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php81;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php81\Php81RectorTest;

/**
 * @see Php81RectorTest
 */
final class Php81Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
