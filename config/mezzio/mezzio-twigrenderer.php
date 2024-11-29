<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Mezzio\MezzioTwigrenderer\RevampMezzioTwigrendererRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioTwigrenderer\MezzioTwigrendererSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
