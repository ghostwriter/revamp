<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\Testify;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class TestifySetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Testify', 'Testify', '0', 'config/ghostwriter/testify.php'),
            new Set('Testify', 'GhostwriterTestifyTestifyRector', 'config/ghostwriter/testify.php'),
        ];
    }
}
