<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Phormat;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class PhormatSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Phormat', 'Phormat', '0', 'config/ghostwriter/phormat.php'),
            new Set('Phormat', 'GhostwriterPhormatPhormatRector', 'config/ghostwriter/phormat.php'),
        ];
    }
}
