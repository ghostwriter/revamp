<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Compliance\ComplianceRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([ComplianceRector::class]);
