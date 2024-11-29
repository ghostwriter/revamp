<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Laminas\LaminasMvcPluginIdentity;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampLaminasMvcPluginIdentityRectorTest
 */
final class RevampLaminasMvcPluginIdentityRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
