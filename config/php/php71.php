<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\PHP\PHP71\RevampPHP71Rector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\PHP\PHP71\PHP71SetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
