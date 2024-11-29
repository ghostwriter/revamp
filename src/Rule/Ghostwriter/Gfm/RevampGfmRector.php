<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Ghostwriter\Gfm;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampGfmRectorTest
 */
final class RevampGfmRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
