<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasServicemanager\RevampLaminasServicemanagerRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasServicemanager\LaminasServicemanagerSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
