<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasStratigility\RevampLaminasStratigilityRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasStratigility\LaminasStratigilitySetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
