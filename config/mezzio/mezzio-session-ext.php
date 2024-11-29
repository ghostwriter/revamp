<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Mezzio\MezzioSessionExt\RevampMezzioSessionExtRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioSessionExt\MezzioSessionExtSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
