<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasCodingStandard\RevampLaminasCodingStandardRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCodingStandard\LaminasCodingStandardSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
