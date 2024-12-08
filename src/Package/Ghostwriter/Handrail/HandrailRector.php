<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Handrail;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Handrail\HandrailRectorTest;

/**
 * @see HandrailRectorTest
 */
final class HandrailRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
