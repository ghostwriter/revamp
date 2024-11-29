<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Mezzio\MezzioAuthorization;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampMezzioAuthorizationRectorTest
 */
final class RevampMezzioAuthorizationRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
