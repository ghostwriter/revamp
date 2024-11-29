<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Mezzio\MezzioMigration\RevampMezzioMigrationRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioMigration\MezzioMigrationSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
