<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Psr\HttpFactory;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampHttpFactoryRectorTest
 */
final class RevampHttpFactoryRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
