<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php74;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php74SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php74', 'Php74', '0', 'config/php/php74.php'),
            new Set('Php74', 'PhpPhp74Php74Rector', 'config/php/php74.php'),
        ];
    }
}
