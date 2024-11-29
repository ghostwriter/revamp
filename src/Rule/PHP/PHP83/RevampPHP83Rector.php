<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\PHP83;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHP83RectorTest
 */
final class RevampPHP83Rector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
