<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Config\ConfigRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Config\ConfigSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([ConfigRector::class])
    // ->withSetProviders(ConfigSetProvider::class)
;
