<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Ghostwriter\Filesystem;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampFilesystemRectorTest
 */
final class RevampFilesystemRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
