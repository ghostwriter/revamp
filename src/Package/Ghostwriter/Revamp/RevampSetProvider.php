<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Revamp;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class RevampSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Revamp', 'Revamp', '0', 'config/ghostwriter/revamp.php'),
            new Set('Revamp', 'GhostwriterRevampRevampRector', 'config/ghostwriter/revamp.php'),
        ];
    }
}
