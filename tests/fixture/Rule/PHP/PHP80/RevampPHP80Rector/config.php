<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([\Ghostwriter\Revamp\Rule\PHP\PHP80\RevampPHP80Rector::class]);
