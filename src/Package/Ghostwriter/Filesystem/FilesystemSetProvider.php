<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Filesystem;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class FilesystemSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Filesystem', 'Filesystem', '0', 'config/ghostwriter/filesystem.php'),
            new Set('Filesystem', 'GhostwriterFilesystemFilesystemRector', 'config/ghostwriter/filesystem.php'),
        ];
    }
}
