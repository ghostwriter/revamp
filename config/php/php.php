<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php\ReplaceUnnecessaryDoubleQuotesRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(ReplaceUnnecessaryDoubleQuotesRector::class);
};
