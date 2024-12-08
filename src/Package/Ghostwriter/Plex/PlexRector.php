<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Plex;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\Plex\PlexRectorTest;

/**
 * @see PlexRectorTest
 */
final class PlexRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
