<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Vimeo\Psalm;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampPsalmRectorTest
 */
final class RevampPsalmRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
