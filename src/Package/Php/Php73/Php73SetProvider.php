<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php73;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php73SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php73', 'Php73', '0', 'config/php/php73.php'),
            new Set('Php73', 'PhpPhp73Php73Rector', 'config/php/php73.php'),
        ];
    }
}
