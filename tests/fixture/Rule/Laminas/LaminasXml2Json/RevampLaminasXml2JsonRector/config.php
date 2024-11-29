<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules(
    [\Ghostwriter\Revamp\Rule\Laminas\LaminasXml2Json\RevampLaminasXml2JsonRector::class]
);
