<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Mockery\Mockery\RevampMockeryRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Mockery\Mockery\MockerySetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
