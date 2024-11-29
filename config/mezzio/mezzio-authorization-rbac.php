<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Mezzio\MezzioAuthorizationRbac\RevampMezzioAuthorizationRbacRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthorizationRbac\MezzioAuthorizationRbacSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
