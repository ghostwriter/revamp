<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\CodingStandard;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class CodingStandardSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('CodingStandard', 'CodingStandard', '0', 'config/ghostwriter/coding-standard.php'),
            new Set('CodingStandard', 'GhostwriterCodingStandardCodingStandardRector', 'config/ghostwriter/coding-standard.php'),
        ];
    }
}
