<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Mockery\Mockery\ShouldReceiveToExpectsRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ShouldReceiveToExpectsRector::class]);
