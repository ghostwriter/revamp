<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\EventDispatcher;

use Override;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;
use Rector\Set\ValueObject\Set;

final readonly class EventDispatcherSetProvider implements SetProviderInterface
{
    /**
     * @return SetInterface[]
     */
    #[Override]
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet('EventDispatcher', 'EventDispatcher', '0', 'config/ghostwriter/event-dispatcher.php'),
            new Set('EventDispatcher', 'GhostwriterEventDispatcherEventDispatcherRector', 'config/ghostwriter/event-dispatcher.php'),
        ];
    }
}
