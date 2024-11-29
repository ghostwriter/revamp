<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Webmozart\Assert;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampAssertRectorTest
 */
final class RevampAssertRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
