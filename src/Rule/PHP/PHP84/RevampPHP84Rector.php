<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\PHP84;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHP84RectorTest
 */
final class RevampPHP84Rector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
