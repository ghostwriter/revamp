<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Mezzio\MezzioAuthorization\RevampMezzioAuthorizationRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthorization\MezzioAuthorizationSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
