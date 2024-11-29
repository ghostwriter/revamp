<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Composer\Composer\RevampComposerRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Composer\Composer\ComposerSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
