<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php74\Php74Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php74Rector::class]);
