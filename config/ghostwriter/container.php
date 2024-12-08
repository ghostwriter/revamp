<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Container\ContainerRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Container\ContainerSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([ContainerRector::class])
    // ->withSetProviders(ContainerSetProvider::class)
;
