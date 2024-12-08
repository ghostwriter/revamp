<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php83;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php83SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php83', 'Php83', '0', 'config/php/php83.php'),
            new Set('Php83', 'PhpPhp83Php83Rector', 'config/php/php83.php'),
        ];
    }
}
