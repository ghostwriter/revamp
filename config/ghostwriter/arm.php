<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Arm\ArmRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Arm\ArmSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([ArmRector::class])
    // ->withSetProviders(ArmSetProvider::class)
;
