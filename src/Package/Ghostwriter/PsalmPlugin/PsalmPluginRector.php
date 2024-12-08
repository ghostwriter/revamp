<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\PsalmPlugin;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\PsalmPlugin\PsalmPluginRectorTest;

/**
 * @see PsalmPluginRectorTest
 */
final class PsalmPluginRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
