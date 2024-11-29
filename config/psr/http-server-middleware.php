<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Psr\HttpServerMiddleware\RevampHttpServerMiddlewareRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Psr\HttpServerMiddleware\HttpServerMiddlewareSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
