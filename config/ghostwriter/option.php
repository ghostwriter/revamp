<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Option\OptionRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Option\OptionSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([OptionRector::class])
    // ->withSetProviders(OptionSetProvider::class)
;
