<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Psr\EventDispatcher\RevampEventDispatcherRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Psr\EventDispatcher\EventDispatcherSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
