<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasDevelopmentMode\RevampLaminasDevelopmentModeRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasDevelopmentMode\LaminasDevelopmentModeSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
