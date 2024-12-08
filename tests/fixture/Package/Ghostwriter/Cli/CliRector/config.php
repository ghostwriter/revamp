<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Cli\CliRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([CliRector::class]);
