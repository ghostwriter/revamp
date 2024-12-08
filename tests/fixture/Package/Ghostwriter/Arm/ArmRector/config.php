<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Arm\ArmRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ArmRector::class]);
