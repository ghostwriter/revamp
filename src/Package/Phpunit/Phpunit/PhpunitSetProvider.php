<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Phpunit\Phpunit;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class PhpunitSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Phpunit', 'Phpunit', '0', 'config/phpunit/phpunit.php'),
            new Set('Phpunit', 'PhpunitPhpunitTestThrowsThrowableDocCommentRector', 'config/phpunit/phpunit.php'),
        ];
    }
}
