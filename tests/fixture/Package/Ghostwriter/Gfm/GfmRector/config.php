<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Gfm\GfmRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([GfmRector::class]);
