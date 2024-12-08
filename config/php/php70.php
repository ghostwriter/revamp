<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php70\Php70Rector;
use Ghostwriter\Revamp\Package\Php\Php70\Php70SetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([Php70Rector::class])
    // ->withSetProviders(Php70SetProvider::class)
;
