<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Plex\PlexRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Plex\PlexSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([PlexRector::class])
    // ->withSetProviders(PlexSetProvider::class)
;
