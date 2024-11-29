<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Sebastian\Exporter;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampExporterRectorTest
 */
final class RevampExporterRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
