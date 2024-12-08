<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php85\Php85Rector;
use Ghostwriter\Revamp\Package\Php\Php85\Php85SetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([Php85Rector::class])
    // ->withSetProviders(Php85SetProvider::class)
;
