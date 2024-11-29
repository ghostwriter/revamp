<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Psr\Cache\RevampCacheRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Psr\Cache\CacheSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
