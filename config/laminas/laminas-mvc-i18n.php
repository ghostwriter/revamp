<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([\Ghostwriter\Revamp\Rule\Laminas\LaminasMvcI18N\RevampLaminasMvcI18NRector::class])
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvcI18N\LaminasMvcI18NSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
