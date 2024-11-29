<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules(
        [\Ghostwriter\Revamp\Rule\Laminas\LaminasCacheStorageAdapterFilesystem\RevampLaminasCacheStorageAdapterFilesystemRector::class]
    )
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterFilesystem\LaminasCacheStorageAdapterFilesystemSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
