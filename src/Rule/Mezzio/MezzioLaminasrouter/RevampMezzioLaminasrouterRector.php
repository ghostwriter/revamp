<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Mezzio\MezzioLaminasrouter;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampMezzioLaminasrouterRectorTest
 */
final class RevampMezzioLaminasrouterRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
