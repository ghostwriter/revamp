<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Option\OptionRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([OptionRector::class]);
