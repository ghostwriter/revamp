<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules(
        [\Ghostwriter\Revamp\Rule\Laminas\LaminasMvcPluginFlashmessenger\RevampLaminasMvcPluginFlashmessengerRector::class]
    )
//    ->withSetProviders(
//      // once this method is accepted, uncomment this line
//        \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvcPluginFlashmessenger\LaminasMvcPluginFlashmessengerSetProvider::class,
//    )
    ->withSets([
        // your sets here
    ]);
