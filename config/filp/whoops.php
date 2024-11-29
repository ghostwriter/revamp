<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Filp\Whoops\RevampWhoopsRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Filp\Whoops\WhoopsSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
