<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Collection;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Collection\CollectionRectorTest;

/**
 * @see CollectionRectorTest
 */
final class CollectionRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
