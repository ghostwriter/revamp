<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Uuid\UuidRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([UuidRector::class]);
