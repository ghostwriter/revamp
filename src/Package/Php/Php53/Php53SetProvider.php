<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php53;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php53SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php53', 'Php53', '0', 'config/php/php53.php'),
            new Set('Php53', 'PhpPhp53Php53Rector', 'config/php/php53.php'),
        ];
    }
}
