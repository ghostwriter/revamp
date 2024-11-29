<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([\Ghostwriter\Revamp\Rule\PHP\PHP81\RevampPHP81Rector::class]);
