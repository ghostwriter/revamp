<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Ghostwriter\Testify;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampTestifyRectorTest
 */
final class RevampTestifyRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
