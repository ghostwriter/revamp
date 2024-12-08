<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php83\Php83Rector;
use Ghostwriter\Revamp\Package\Php\Php83\Php83SetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([Php83Rector::class])
    // ->withSetProviders(Php83SetProvider::class)
;
