<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\CaseConverter;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class CaseConverterSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('CaseConverter', 'CaseConverter', '0', 'config/ghostwriter/case-converter.php'),
            new Set('CaseConverter', 'GhostwriterCaseConverterCaseConverterRector', 'config/ghostwriter/case-converter.php'),
        ];
    }
}
