<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php82\Php82Rector;
use Ghostwriter\Revamp\Package\Php\Php82\Php82SetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([Php82Rector::class])
    // ->withSetProviders(Php82SetProvider::class)
;
