<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Laminas\LaminasDeveloperTools;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampLaminasDeveloperToolsRectorTest
 */
final class RevampLaminasDeveloperToolsRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
