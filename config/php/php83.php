<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php83\Php83Rector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (\PHP_VERSION_ID >= 80300) {
        return;
    }

    $rectorConfig->rule(Php83Rector::class);
};
