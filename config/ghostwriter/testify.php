<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Testify\TestifyRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Testify\TestifySetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([TestifyRector::class])
    // ->withSetProviders(TestifySetProvider::class)
;
