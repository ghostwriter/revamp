<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Sebastian\Diff\RevampDiffRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Sebastian\Diff\DiffSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
