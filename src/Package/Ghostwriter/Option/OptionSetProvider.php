<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Option;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class OptionSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Option', 'Option', '0', 'config/ghostwriter/option.php'),
            new Set('Option', 'GhostwriterOptionOptionRector', 'config/ghostwriter/option.php'),
        ];
    }
}
