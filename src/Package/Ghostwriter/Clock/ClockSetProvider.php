<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Clock;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class ClockSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Clock', 'Clock', '0', 'config/ghostwriter/clock.php'),
            new Set('Clock', 'GhostwriterClockClockRector', 'config/ghostwriter/clock.php'),
        ];
    }
}
