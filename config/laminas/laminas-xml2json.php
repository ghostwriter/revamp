<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasXml2Json\RevampLaminasXml2JsonRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasXml2Json\LaminasXml2JsonSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
