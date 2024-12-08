<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Result\ResultRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Result\ResultSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([ResultRector::class])
    // ->withSetProviders(ResultSetProvider::class)
;
