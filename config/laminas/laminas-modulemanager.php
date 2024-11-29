<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasModulemanager\RevampLaminasModulemanagerRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasModulemanager\LaminasModulemanagerSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
