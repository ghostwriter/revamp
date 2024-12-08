<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Shell\ShellRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ShellRector::class]);
