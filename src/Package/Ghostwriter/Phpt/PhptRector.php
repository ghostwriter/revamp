<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Phpt;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Phpt\PhptRectorTest;

/**
 * @see PhptRectorTest
 */
final class PhptRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
