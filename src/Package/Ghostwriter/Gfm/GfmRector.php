<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Gfm;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Gfm\GfmRectorTest;

/**
 * @see GfmRectorTest
 */
final class GfmRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
