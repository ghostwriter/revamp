<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Mockery\Mockery\UseMockeryPHPUnitIntegrationTraitRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([UseMockeryPHPUnitIntegrationTraitRector::class]);
