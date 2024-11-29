<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasI18NPhoneNumber\RevampLaminasI18NPhoneNumberRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasI18NPhoneNumber\LaminasI18NPhoneNumberSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
