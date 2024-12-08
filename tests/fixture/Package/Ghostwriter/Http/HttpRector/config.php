<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Http\HttpRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([HttpRector::class]);
