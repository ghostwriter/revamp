<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Filp\Whoops;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampWhoopsRectorTest
 */
final class RevampWhoopsRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
