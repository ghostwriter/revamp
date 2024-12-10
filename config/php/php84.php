<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php84\Php84Rector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (\PHP_VERSION_ID >= 80400) {
        return;
    }

    $rectorConfig->rule(Php84Rector::class);
};
