<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\SortClassLikeStatementsAlphabeticallyRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([SortClassLikeStatementsAlphabeticallyRector::class]);