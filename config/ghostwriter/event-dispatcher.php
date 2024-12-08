<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\EventDispatcher\EventDispatcherRector;
use Ghostwriter\Revamp\Package\Ghostwriter\EventDispatcher\EventDispatcherSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([EventDispatcherRector::class])
    // ->withSetProviders(EventDispatcherSetProvider::class)
;
