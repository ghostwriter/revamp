<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php81\Php81Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php81Rector::class]);
