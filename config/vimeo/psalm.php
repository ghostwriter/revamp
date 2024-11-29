<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Vimeo\Psalm\RevampPsalmRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Vimeo\Psalm\PsalmSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
