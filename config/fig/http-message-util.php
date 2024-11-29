<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Fig\HttpMessageUtil\RevampHttpMessageUtilRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Fig\HttpMessageUtil\HttpMessageUtilSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
