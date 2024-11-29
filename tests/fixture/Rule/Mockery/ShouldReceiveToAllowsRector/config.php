<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\Mockery\ShouldReceiveToAllowsRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ShouldReceiveToAllowsRector::class]);
