<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Handrail;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class HandrailSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Handrail', 'Handrail', '0', 'config/ghostwriter/handrail.php'),
            new Set('Handrail', 'GhostwriterHandrailHandrailRector', 'config/ghostwriter/handrail.php'),
        ];
    }
}
