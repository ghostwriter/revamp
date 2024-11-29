<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\PHP56;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHP56RectorTest
 */
final class RevampPHP56Rector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
