<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Ghostwriter\PsalmPlugin\RevampPsalmPluginRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Ghostwriter\PsalmPlugin\PsalmPluginSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
