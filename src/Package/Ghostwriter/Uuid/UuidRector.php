<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Uuid;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Uuid\UuidRectorTest;

/**
 * @see UuidRectorTest
 */
final class UuidRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
