<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php80;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php80SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php80', 'Php80', '0', 'config/php/php80.php'),
            new Set('Php80', 'PhpPhp80Php80Rector', 'config/php/php80.php'),
        ];
    }
}
