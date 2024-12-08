<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Nikic\PhpParser\PhpParserRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([PhpParserRector::class]);
