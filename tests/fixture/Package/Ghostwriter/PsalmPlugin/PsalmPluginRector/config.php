<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\PsalmPlugin\PsalmPluginRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([PsalmPluginRector::class]);
