<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Mezzio\MezzioSkeleton\RevampMezzioSkeletonRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioSkeleton\MezzioSkeletonSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
