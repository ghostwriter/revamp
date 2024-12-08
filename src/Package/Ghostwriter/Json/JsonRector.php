<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Json;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Json\JsonRectorTest;

/**
 * @see JsonRectorTest
 */
final class JsonRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
