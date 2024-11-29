<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Laminas\LaminasSerializer;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampLaminasSerializerRectorTest
 */
final class RevampLaminasSerializerRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
