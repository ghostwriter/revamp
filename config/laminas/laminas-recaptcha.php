<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasRecaptcha\RevampLaminasRecaptchaRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasRecaptcha\LaminasRecaptchaSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
