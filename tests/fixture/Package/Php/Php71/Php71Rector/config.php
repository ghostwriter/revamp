<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php71\Php71Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php71Rector::class]);
