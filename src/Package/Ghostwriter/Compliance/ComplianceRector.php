<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Compliance;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Compliance\ComplianceRectorTest;

/**
 * @see ComplianceRectorTest
 */
final class ComplianceRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
