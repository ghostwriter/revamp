<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\CaseConverter\CaseConverterRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([CaseConverterRector::class]);
