<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\PHP82;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHP82RectorTest
 */
final class RevampPHP82Rector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
