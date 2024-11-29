<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Ghostwriter\Environment\RevampEnvironmentRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Ghostwriter\Environment\EnvironmentSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
