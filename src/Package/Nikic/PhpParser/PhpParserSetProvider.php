<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Nikic\PhpParser;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class PhpParserSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('PhpParser', 'PhpParser', '0', 'config/nikic/php-parser.php'),
            new Set('PhpParser', 'NikicPhpParserPhpParserRector', 'config/nikic/php-parser.php'),
        ];
    }
}
