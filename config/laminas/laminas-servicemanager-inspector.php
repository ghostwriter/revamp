<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules(
        [\Ghostwriter\Revamp\Rule\Laminas\LaminasServicemanagerInspector\RevampLaminasServicemanagerInspectorRector::class]
    )
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasServicemanagerInspector\LaminasServicemanagerInspectorSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
