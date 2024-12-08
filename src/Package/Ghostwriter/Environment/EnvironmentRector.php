<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Environment;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Environment\EnvironmentRectorTest;

/**
 * @see EnvironmentRectorTest
 */
final class EnvironmentRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
