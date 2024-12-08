<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Phormat;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Phormat\PhormatRectorTest;

/**
 * @see PhormatRectorTest
 */
final class PhormatRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
