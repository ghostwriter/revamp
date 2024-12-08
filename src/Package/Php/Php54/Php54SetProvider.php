<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php54;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php54SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php54', 'Php54', '0', 'config/php/php54.php'),
            new Set('Php54', 'PhpPhp54Php54Rector', 'config/php/php54.php'),
        ];
    }
}
