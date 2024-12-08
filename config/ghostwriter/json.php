<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Json\JsonRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Json\JsonSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([JsonRector::class])
    // ->withSetProviders(JsonSetProvider::class)
;
