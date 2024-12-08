<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php74\Php74Rector;
use Ghostwriter\Revamp\Package\Php\Php74\Php74SetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([Php74Rector::class])
    // ->withSetProviders(Php74SetProvider::class)
;
