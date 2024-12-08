<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Http\HttpRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Http\HttpSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([HttpRector::class])
    // ->withSetProviders(HttpSetProvider::class)
;
