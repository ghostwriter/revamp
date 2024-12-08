<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Vimeo\Psalm\PsalmRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([PsalmRector::class]);
