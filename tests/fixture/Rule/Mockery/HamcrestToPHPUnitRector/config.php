<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\Mockery\HamcrestToPHPUnitRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([HamcrestToPHPUnitRector::class]);
