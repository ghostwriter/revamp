<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php73\Php73Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php73Rector::class]);
