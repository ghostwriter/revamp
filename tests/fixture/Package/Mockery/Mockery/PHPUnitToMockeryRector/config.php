<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Mockery\Mockery\PHPUnitToMockeryRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([PHPUnitToMockeryRector::class]);
