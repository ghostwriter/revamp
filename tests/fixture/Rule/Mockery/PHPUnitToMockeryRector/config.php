<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\Mockery\PHPUnitToMockeryRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([PHPUnitToMockeryRector::class]);
