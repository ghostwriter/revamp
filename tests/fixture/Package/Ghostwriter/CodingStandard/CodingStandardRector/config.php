<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\CodingStandard\CodingStandardRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([CodingStandardRector::class]);
