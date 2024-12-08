<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Mockery\Mockery\MockeryRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\MockerySetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([MockeryRector::class])
    // ->withSetProviders(MockerySetProvider::class)
;
