<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Testify\TestifyRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([TestifyRector::class]);
