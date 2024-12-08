<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Shell;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class ShellSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Shell', 'Shell', '0', 'config/ghostwriter/shell.php'),
            new Set('Shell', 'GhostwriterShellShellRector', 'config/ghostwriter/shell.php'),
        ];
    }
}
