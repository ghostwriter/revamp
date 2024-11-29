<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasPsr7Bridge\RevampLaminasPsr7BridgeRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasPsr7Bridge\LaminasPsr7BridgeSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
