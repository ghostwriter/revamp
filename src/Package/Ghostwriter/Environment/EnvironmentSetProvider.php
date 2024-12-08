<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Environment;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class EnvironmentSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Environment', 'Environment', '0', 'config/ghostwriter/environment.php'),
            new Set('Environment', 'GhostwriterEnvironmentEnvironmentRector', 'config/ghostwriter/environment.php'),
        ];
    }
}
