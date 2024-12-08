<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Collection\CollectionRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Collection\CollectionSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([CollectionRector::class])
    // ->withSetProviders(CollectionSetProvider::class)
;
