<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Result;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Result\ResultRectorTest;

/**
 * @see ResultRectorTest
 */
final class ResultRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
