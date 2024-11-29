<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Mezzio\MezzioFastroute\RevampMezzioFastrouteRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioFastroute\MezzioFastrouteSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
