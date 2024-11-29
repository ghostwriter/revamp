<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\PHP54;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHP54RectorTest
 */
final class RevampPHP54Rector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
