<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules(
        [\Ghostwriter\Revamp\Rule\Laminas\LaminasCacheStorageAdapterSession\RevampLaminasCacheStorageAdapterSessionRector::class]
    )
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterSession\LaminasCacheStorageAdapterSessionSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
