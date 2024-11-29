<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\PHP\PHP53\RevampPHP53Rector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\PHP\PHP53\PHP53SetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
