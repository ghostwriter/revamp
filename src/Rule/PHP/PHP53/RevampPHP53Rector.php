<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\PHP53;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHP53RectorTest
 */
final class RevampPHP53Rector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
