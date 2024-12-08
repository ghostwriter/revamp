<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php56;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class Php56SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Php56', 'Php56', '0', 'config/php/php56.php'),
            new Set('Php56', 'PhpPhp56Php56Rector', 'config/php/php56.php'),
        ];
    }
}
