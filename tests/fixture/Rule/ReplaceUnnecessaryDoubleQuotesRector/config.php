<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\ReplaceUnnecessaryDoubleQuotesRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ReplaceUnnecessaryDoubleQuotesRector::class]);
