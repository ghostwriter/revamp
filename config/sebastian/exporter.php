<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Sebastian\Exporter\RevampExporterRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Sebastian\Exporter\ExporterSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
