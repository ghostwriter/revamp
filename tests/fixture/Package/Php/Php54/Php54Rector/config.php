<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php54\Php54Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php54Rector::class]);