<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php70;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php70SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php70', 'Php70', '0', 'config/php/php70.php'),
            new Set('Php70', 'PhpPhp70Php70Rector', 'config/php/php70.php'),
        ];
    }
}
