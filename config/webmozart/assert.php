<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Webmozart\Assert\RevampAssertRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Webmozart\Assert\AssertSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
