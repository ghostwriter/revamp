<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\Mockery\ProphecyToMockeryRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ProphecyToMockeryRector::class]);
