<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php53\Php53Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php53Rector::class]);
