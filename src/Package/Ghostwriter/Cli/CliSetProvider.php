<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Cli;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class CliSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Cli', 'Cli', '0', 'config/ghostwriter/cli.php'),
            new Set('Cli', 'GhostwriterCliCliRector', 'config/ghostwriter/cli.php'),
        ];
    }
}
