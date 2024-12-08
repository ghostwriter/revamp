<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php72\Php72Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php72Rector::class]);
