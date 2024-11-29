<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasCode\RevampLaminasCodeRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCode\LaminasCodeSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
