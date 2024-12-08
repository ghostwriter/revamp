<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Nikic\PhpParser;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Nikic\PhpParser\PhpParserRectorTest;

/**
 * @see PhpParserRectorTest
 */
final class PhpParserRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
