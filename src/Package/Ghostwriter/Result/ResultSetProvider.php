<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Result;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class ResultSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Result', 'Result', '0', 'config/ghostwriter/result.php'),
            new Set('Result', 'GhostwriterResultResultRector', 'config/ghostwriter/result.php'),
        ];
    }
}
