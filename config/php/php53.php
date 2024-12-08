<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php53\Php53Rector;
use Ghostwriter\Revamp\Package\Php\Php53\Php53SetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([Php53Rector::class])
    // ->withSetProviders(Php53SetProvider::class)
;
