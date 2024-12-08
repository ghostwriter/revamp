<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php72;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php72SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php72', 'Php72', '0', 'config/php/php72.php'),
            new Set('Php72', 'PhpPhp72Php72Rector', 'config/php/php72.php'),
        ];
    }
}
