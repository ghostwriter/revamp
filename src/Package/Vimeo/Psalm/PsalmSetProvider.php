<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Vimeo\Psalm;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class PsalmSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Psalm', 'Psalm', '0', 'config/vimeo/psalm.php'),
            new Set('Psalm', 'VimeoPsalmPsalmRector', 'config/vimeo/psalm.php'),
        ];
    }
}
