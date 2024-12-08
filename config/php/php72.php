<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php72\Php72Rector;
use Ghostwriter\Revamp\Package\Php\Php72\Php72SetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([Php72Rector::class])
    // ->withSetProviders(Php72SetProvider::class)
;
