<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Mezzio\MezzioAuthorizationRbac;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampMezzioAuthorizationRbacRectorTest
 */
final class RevampMezzioAuthorizationRbacRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
