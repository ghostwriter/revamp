<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Cli;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Cli\CliRectorTest;

/**
 * @see CliRectorTest
 */
final class CliRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
