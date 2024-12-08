<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Config;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Config\ConfigRectorTest;

/**
 * @see ConfigRectorTest
 */
final class ConfigRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
