<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Uuid;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class UuidSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Uuid', 'Uuid', '0', 'config/ghostwriter/uuid.php'),
            new Set('Uuid', 'GhostwriterUuidUuidRector', 'config/ghostwriter/uuid.php'),
        ];
    }
}
