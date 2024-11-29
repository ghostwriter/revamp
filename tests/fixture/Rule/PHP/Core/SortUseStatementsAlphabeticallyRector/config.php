<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\PHP\Core\SortUseStatementsAlphabeticallyRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([SortUseStatementsAlphabeticallyRector::class]);
