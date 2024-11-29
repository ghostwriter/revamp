<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\PHPUnit\TestThrowsThrowableDocCommentRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([TestThrowsThrowableDocCommentRector::class]);
