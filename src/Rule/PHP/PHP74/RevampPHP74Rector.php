<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\PHP74;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHP74RectorTest
 */
final class RevampPHP74Rector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
