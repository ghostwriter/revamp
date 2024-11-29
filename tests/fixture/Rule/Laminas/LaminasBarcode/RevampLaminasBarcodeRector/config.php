<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules(
    [\Ghostwriter\Revamp\Rule\Laminas\LaminasBarcode\RevampLaminasBarcodeRector::class]
);
