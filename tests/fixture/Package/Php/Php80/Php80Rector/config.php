<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php80\Php80Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php80Rector::class]);
