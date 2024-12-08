<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Revamp;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Revamp\RevampRectorTest;

/**
 * @see RevampRectorTest
 */
final class RevampRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
