<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\PHP\PHP72\RevampPHP72Rector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\PHP\PHP72\PHP72SetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
