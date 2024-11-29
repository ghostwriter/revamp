<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Laminas\LaminasCacheStorageAdapterSession;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampLaminasCacheStorageAdapterSessionRectorTest
 */
final class RevampLaminasCacheStorageAdapterSessionRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
