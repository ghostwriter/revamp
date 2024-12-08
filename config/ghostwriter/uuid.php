<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Uuid\UuidRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Uuid\UuidSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([UuidRector::class])
    // ->withSetProviders(UuidSetProvider::class)
;
