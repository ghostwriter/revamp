<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Mezzio\MezzioCsrf;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampMezzioCsrfRectorTest
 */
final class RevampMezzioCsrfRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
