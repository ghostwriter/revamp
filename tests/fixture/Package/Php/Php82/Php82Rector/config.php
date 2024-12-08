<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php82\Php82Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php82Rector::class]);
