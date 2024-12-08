<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\PsalmPlugin;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class PsalmPluginSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('PsalmPlugin', 'PsalmPlugin', '0', 'config/ghostwriter/psalm-plugin.php'),
            new Set('PsalmPlugin', 'GhostwriterPsalmPluginPsalmPluginRector', 'config/ghostwriter/psalm-plugin.php'),
        ];
    }
}
