<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Mezzio\MezzioPlatesrenderer\RevampMezzioPlatesrendererRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioPlatesrenderer\MezzioPlatesrendererSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
