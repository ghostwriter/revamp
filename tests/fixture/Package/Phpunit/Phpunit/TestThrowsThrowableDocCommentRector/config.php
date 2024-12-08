<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Phpunit\Phpunit\TestThrowsThrowableDocCommentRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([TestThrowsThrowableDocCommentRector::class]);
