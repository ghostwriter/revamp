<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php84\Php84Rector;
use Ghostwriter\Revamp\Package\Php\Php84\Php84SetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([Php84Rector::class])
    // ->withSetProviders(Php84SetProvider::class)
;
