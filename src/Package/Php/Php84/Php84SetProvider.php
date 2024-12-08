<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php84;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php84SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php84', 'Php84', '0', 'config/php/php84.php'),
            new Set('Php84', 'PhpPhp84Php84Rector', 'config/php/php84.php'),
        ];
    }
}
