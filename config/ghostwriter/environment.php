<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Environment\EnvironmentRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Environment\EnvironmentSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([EnvironmentRector::class])
    // ->withSetProviders(EnvironmentSetProvider::class)
;
