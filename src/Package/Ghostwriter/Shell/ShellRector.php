<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Shell;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Shell\ShellRectorTest;

/**
 * @see ShellRectorTest
 */
final class ShellRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
