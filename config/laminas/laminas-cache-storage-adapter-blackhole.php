<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules(
        [\Ghostwriter\Revamp\Rule\Laminas\LaminasCacheStorageAdapterBlackhole\RevampLaminasCacheStorageAdapterBlackholeRector::class]
    )
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterBlackhole\LaminasCacheStorageAdapterBlackholeSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
