<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php81\Php81Rector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (\PHP_VERSION_ID >= 80100) {
        return;
    }

    $rectorConfig->rule(Php81Rector::class);
};
