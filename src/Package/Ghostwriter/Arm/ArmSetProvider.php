<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Arm;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class ArmSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Arm', 'Arm', '0', 'config/ghostwriter/arm.php'),
            new Set('Arm', 'GhostwriterArmArmRector', 'config/ghostwriter/arm.php'),
        ];
    }
}
