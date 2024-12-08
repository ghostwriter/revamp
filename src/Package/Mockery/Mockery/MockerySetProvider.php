<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Mockery\Mockery;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class MockerySetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('Mockery', 'Mockery', '0', 'config/mockery/mockery.php'),
            new Set('Mockery', 'MockeryMockeryMockeryRector', 'config/mockery/mockery.php'),
        ];
    }
}
