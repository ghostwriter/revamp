<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasDeveloperTools\RevampLaminasDeveloperToolsRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasDeveloperTools\LaminasDeveloperToolsSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
