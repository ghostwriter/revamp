<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    foreach (
        new \RegexIterator(
            new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator(__DIR__),
                \RecursiveIteratorIterator::LEAVES_ONLY
            ),
            '#.php$#u'
        ) as $file
    ) {
        if (! $file instanceof \SplFileInfo) {
            continue;
        }

        $realPath = $file->getRealPath();

        if ($realPath === false) {
            continue;
        }

        if ($realPath === __FILE__) {
            continue;
        }

        $rectorConfig->import($realPath);
    }
};
