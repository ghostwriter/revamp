<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasI18NResources\RevampLaminasI18NResourcesRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasI18NResources\LaminasI18NResourcesSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
