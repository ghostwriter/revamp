<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Vimeo\Psalm;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Vimeo\Psalm\PsalmRectorTest;

/**
 * @see PsalmRectorTest
 */
final class PsalmRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
