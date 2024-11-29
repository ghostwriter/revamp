<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasDiagnostics\RevampLaminasDiagnosticsRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasDiagnostics\LaminasDiagnosticsSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
