<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\PHP81;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHP81RectorTest
 */
final class RevampPHP81Rector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
