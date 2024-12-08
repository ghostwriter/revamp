<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php71;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php71SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php71', 'Php71', '0', 'config/php/php71.php'),
            new Set('Php71', 'PhpPhp71Php71Rector', 'config/php/php71.php'),
        ];
    }
}
