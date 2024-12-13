<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Nikic\PhpParser;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Nikic\PhpParser\PhpParser50RectorTest;

/**
 * @see PhpParser50RectorTest
 */
final class PhpParser50Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
