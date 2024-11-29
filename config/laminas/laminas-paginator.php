<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasPaginator\RevampLaminasPaginatorRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasPaginator\LaminasPaginatorSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
