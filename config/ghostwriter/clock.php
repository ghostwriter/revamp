<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Clock\ClockRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Clock\ClockSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([ClockRector::class])
    // ->withSetProviders(ClockSetProvider::class)
;
