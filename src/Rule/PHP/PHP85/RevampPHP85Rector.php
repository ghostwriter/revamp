<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\PHP85;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHP85RectorTest
 */
final class RevampPHP85Rector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
