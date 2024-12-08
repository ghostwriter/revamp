<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Http;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Http\HttpRectorTest;

/**
 * @see HttpRectorTest
 */
final class HttpRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
