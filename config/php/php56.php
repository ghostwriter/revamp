<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\PHP\PHP56\RevampPHP56Rector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\PHP\PHP56\PHP56SetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
