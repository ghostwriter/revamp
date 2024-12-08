<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php82;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php82SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php82', 'Php82', '0', 'config/php/php82.php'),
            new Set('Php82', 'PhpPhp82Php82Rector', 'config/php/php82.php'),
        ];
    }
}
