<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules(
        [\Ghostwriter\Revamp\Rule\Laminas\LaminasComposerAutoloading\RevampLaminasComposerAutoloadingRector::class]
    )
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasComposerAutoloading\LaminasComposerAutoloadingSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
