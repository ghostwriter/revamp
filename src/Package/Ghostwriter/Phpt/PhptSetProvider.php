<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Phpt;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class PhptSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Phpt', 'Phpt', '0', 'config/ghostwriter/phpt.php'),
            new Set('Phpt', 'GhostwriterPhptPhptRector', 'config/ghostwriter/phpt.php'),
        ];
    }
}
