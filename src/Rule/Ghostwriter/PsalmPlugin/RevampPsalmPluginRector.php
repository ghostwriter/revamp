<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Ghostwriter\PsalmPlugin;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPsalmPluginRectorTest
 */
final class RevampPsalmPluginRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
