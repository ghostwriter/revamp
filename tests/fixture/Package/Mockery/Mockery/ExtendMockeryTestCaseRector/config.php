<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Mockery\Mockery\ExtendMockeryTestCaseRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ExtendMockeryTestCaseRector::class]);
