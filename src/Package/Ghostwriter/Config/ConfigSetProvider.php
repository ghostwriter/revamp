<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Config;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class ConfigSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Config', 'Config', '0', 'config/ghostwriter/config.php'),
            new Set('Config', 'GhostwriterConfigConfigRector', 'config/ghostwriter/config.php'),
        ];
    }
}
