<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([\Ghostwriter\Revamp\Rule\PHP\PHP82\RevampPHP82Rector::class]);