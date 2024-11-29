<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\Mockery\UseMockeryPHPUnitIntegrationTraitRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([UseMockeryPHPUnitIntegrationTraitRector::class]);
