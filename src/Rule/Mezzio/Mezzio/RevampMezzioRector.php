<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Mezzio\Mezzio;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampMezzioRectorTest
 */
final class RevampMezzioRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
