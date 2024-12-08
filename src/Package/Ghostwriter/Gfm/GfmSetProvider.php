<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Gfm;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class GfmSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Gfm', 'Gfm', '0', 'config/ghostwriter/gfm.php'),
            new Set('Gfm', 'GhostwriterGfmGfmRector', 'config/ghostwriter/gfm.php'),
        ];
    }
}
