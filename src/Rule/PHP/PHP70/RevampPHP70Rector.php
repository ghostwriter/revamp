<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\PHP70;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHP70RectorTest
 */
final class RevampPHP70Rector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
