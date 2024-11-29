<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthenticationOauth2;

use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class MezzioAuthenticationOauth2SetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[\Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('group_name', 'package_name', '1.0', __DIR__ . 'set_file_path.php'),
            new Set('group_name', 'set_name', __DIR__ . 'set_file_path.php'),
        ];
    }
}
