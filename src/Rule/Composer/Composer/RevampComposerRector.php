<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Composer\Composer;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampComposerRectorTest
 */
final class RevampComposerRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
