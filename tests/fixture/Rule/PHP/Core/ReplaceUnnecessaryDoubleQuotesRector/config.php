<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\PHP\Core\ReplaceUnnecessaryDoubleQuotesRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ReplaceUnnecessaryDoubleQuotesRector::class]);
