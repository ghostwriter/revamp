<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Json;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class JsonSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Json', 'Json', '0', 'config/ghostwriter/json.php'),
            new Set('Json', 'GhostwriterJsonJsonRector', 'config/ghostwriter/json.php'),
        ];
    }
}
