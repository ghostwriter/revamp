<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Collection\CollectionRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([CollectionRector::class]);
