<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Ghostwriter\Http\RevampHttpRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Ghostwriter\Http\HttpSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
