<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Plex;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class PlexSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Plex', 'Plex', '0', 'config/ghostwriter/plex.php'),
            new Set('Plex', 'GhostwriterPlexPlexRector', 'config/ghostwriter/plex.php'),
        ];
    }
}
