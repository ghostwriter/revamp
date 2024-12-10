<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php85\Php85Rector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (\PHP_VERSION_ID >= 80500) {
        return;
    }

    $rectorConfig->rule(Php85Rector::class);
};
