<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Ghostwriter\Handrail\RevampHandrailRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Ghostwriter\Handrail\HandrailSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
