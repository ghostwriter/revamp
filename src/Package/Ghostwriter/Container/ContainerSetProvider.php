<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Container;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class ContainerSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Container', 'Container', '0', 'config/ghostwriter/container.php'),
            new Set('Container', 'GhostwriterContainerContainerRector', 'config/ghostwriter/container.php'),
        ];
    }
}
