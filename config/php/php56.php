<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php56\Php56Rector;
use Ghostwriter\Revamp\Package\Php\Php56\Php56SetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([Php56Rector::class])
    // ->withSetProviders(Php56SetProvider::class)
;
