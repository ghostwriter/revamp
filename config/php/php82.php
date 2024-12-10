<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Php\Php82\Php82Rector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (\PHP_VERSION_ID >= 80200) {
        return;
    }

    $rectorConfig->rule(Php82Rector::class);
};
