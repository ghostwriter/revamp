<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php80\Php80Rector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (\PHP_VERSION_ID >= 80000) {
        return;
    }

    $rectorConfig->rule(Php80Rector::class);
};
