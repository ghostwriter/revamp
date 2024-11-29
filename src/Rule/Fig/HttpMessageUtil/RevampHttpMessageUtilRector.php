<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Fig\HttpMessageUtil;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampHttpMessageUtilRectorTest
 */
final class RevampHttpMessageUtilRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
