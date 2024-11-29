<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasDependencyPlugin\RevampLaminasDependencyPluginRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasDependencyPlugin\LaminasDependencyPluginSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
