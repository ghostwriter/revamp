<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php82;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Php\Php82\Php82RectorTest;

/**
 * @see Php82RectorTest
 */
final class Php82Rector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
