<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Filesystem;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Filesystem\FilesystemRectorTest;

/**
 * @see FilesystemRectorTest
 */
final class FilesystemRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
