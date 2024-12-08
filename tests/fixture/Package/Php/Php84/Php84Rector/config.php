<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php84\Php84Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php84Rector::class]);
