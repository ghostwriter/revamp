<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\Mockery\ShouldReceiveToExpectsRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ShouldReceiveToExpectsRector::class]);
