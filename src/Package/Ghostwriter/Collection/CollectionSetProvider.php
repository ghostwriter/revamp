<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Collection;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class CollectionSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Collection', 'Collection', '0', 'config/ghostwriter/collection.php'),
            new Set('Collection', 'GhostwriterCollectionCollectionRector', 'config/ghostwriter/collection.php'),
        ];
    }
}
