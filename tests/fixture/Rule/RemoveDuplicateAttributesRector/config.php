<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\RemoveDuplicateAttributesRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([RemoveDuplicateAttributesRector::class]);