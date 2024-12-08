<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Filesystem\FilesystemRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([FilesystemRector::class]);
