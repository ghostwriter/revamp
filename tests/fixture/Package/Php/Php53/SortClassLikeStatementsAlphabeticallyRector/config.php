<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php53\SortClassLikeStatementsAlphabeticallyRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([SortClassLikeStatementsAlphabeticallyRector::class]);
