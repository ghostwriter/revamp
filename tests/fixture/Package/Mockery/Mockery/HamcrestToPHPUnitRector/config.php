<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Mockery\Mockery\HamcrestToPHPUnitRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([HamcrestToPHPUnitRector::class]);
