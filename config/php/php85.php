<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\PHP\PHP85\RevampPHP85Rector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\PHP\PHP85\PHP85SetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
