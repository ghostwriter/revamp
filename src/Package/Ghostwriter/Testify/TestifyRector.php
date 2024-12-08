<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Testify;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Testify\TestifyRectorTest;

/**
 * @see TestifyRectorTest
 */
final class TestifyRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
