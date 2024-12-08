<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Mockery\Mockery\MockeryRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([MockeryRector::class]);
