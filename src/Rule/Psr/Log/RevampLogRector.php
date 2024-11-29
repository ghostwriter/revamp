<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Psr\Log;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampLogRectorTest
 */
final class RevampLogRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
