<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php53\ReplaceUnnecessaryDoubleQuotesRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ReplaceUnnecessaryDoubleQuotesRector::class]);
