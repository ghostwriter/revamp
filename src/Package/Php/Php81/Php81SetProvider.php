<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php81;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php81SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php81', 'Php81', '0', 'config/php/php81.php'),
            new Set('Php81', 'PhpPhp81Php81Rector', 'config/php/php81.php'),
        ];
    }
}
