<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php56\Php56Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([Php56Rector::class]);
