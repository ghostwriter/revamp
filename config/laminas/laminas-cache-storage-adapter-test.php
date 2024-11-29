<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules(
        [\Ghostwriter\Revamp\Rule\Laminas\LaminasCacheStorageAdapterTest\RevampLaminasCacheStorageAdapterTestRector::class]
    )
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterTest\LaminasCacheStorageAdapterTestSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
