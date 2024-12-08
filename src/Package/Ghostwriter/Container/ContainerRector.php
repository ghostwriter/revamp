<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Container;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Container\ContainerRectorTest;

/**
 * @see ContainerRectorTest
 */
final class ContainerRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
