<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Handrail\HandrailRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([HandrailRector::class]);
