<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Option;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Option\OptionRectorTest;

/**
 * @see OptionRectorTest
 */
final class OptionRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
