<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php81\Php81Rector;
use Ghostwriter\Revamp\Package\Php\Php81\Php81SetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([Php81Rector::class])
    // ->withSetProviders(Php81SetProvider::class)
;
