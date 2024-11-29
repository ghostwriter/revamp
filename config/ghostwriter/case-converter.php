<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Ghostwriter\CaseConverter\RevampCaseConverterRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Ghostwriter\CaseConverter\CaseConverterSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
