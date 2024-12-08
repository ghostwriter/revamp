<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Revamp\RevampRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Revamp\RevampSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([RevampRector::class])
    // ->withSetProviders(RevampSetProvider::class)
;
