<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php53\SortUseStatementsAlphabeticallyRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([SortUseStatementsAlphabeticallyRector::class]);
