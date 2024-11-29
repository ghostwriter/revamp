<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Psr\SimpleCache\RevampSimpleCacheRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Psr\SimpleCache\SimpleCacheSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
