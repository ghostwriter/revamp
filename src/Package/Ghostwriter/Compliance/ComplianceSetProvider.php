<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Compliance;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class ComplianceSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Compliance', 'Compliance', '0', 'config/ghostwriter/compliance.php'),
            new Set('Compliance', 'GhostwriterComplianceComplianceRector', 'config/ghostwriter/compliance.php'),
        ];
    }
}
