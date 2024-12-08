<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Http;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class HttpSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Http', 'Http', '0', 'config/ghostwriter/http.php'),
            new Set('Http', 'GhostwriterHttpHttpRector', 'config/ghostwriter/http.php'),
        ];
    }
}
