<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\PHPUnit\PHPUnit\RevampPHPUnitRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\PHPUnit\PHPUnit\PHPUnitSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
