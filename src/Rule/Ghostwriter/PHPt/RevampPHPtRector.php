<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Ghostwriter\PHPt;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPHPtRectorTest
 */
final class RevampPHPtRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
