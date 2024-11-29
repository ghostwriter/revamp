<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules(
        [\Ghostwriter\Revamp\Rule\Mezzio\MezzioLaminasviewrenderer\RevampMezzioLaminasviewrendererRector::class]
    )
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioLaminasviewrenderer\MezzioLaminasviewrendererSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
