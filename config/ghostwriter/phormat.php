<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Phormat\PhormatRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Phormat\PhormatSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([PhormatRector::class])
    // ->withSetProviders(PhormatSetProvider::class)
;
