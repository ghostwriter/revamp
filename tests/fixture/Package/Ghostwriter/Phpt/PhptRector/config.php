<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Phpt\PhptRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([PhptRector::class]);
