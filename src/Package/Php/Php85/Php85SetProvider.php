<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php85;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php85SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php85', 'Php85', '0', 'config/php/php85.php'),
            new Set('Php85', 'PhpPhp85Php85Rector', 'config/php/php85.php'),
        ];
    }
}
