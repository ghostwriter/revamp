<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Arm;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Arm\ArmRectorTest;

/**
 * @see ArmRectorTest
 */
final class ArmRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
