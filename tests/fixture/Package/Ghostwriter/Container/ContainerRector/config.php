<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Container\ContainerRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ContainerRector::class]);
