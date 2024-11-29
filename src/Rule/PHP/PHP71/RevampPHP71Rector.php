<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\PHP71;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHP71RectorTest
 */
final class RevampPHP71Rector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
