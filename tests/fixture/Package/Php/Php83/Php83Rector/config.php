<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php83\Php83Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php83Rector::class]);
