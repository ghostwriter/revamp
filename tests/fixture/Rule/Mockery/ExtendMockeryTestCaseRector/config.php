<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\Mockery\ExtendMockeryTestCaseRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ExtendMockeryTestCaseRector::class]);
