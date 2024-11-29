<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules(
        [\Ghostwriter\Revamp\Rule\Mezzio\MezzioAuthenticationOauth2\RevampMezzioAuthenticationOauth2Rector::class]
    )
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthenticationOauth2\MezzioAuthenticationOauth2SetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
