<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Phormat\PhormatRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([PhormatRector::class]);
