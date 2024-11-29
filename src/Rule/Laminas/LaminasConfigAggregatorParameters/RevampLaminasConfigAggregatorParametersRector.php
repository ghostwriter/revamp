<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Laminas\LaminasConfigAggregatorParameters;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampLaminasConfigAggregatorParametersRectorTest
 */
final class RevampLaminasConfigAggregatorParametersRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
