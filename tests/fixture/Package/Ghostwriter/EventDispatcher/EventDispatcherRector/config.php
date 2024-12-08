<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\EventDispatcher\EventDispatcherRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([EventDispatcherRector::class]);
