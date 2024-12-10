<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use Ghostwriter\Revamp\Package\Ghostwriter\Result\ResultRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('ghostwriter/result')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'ghostwriter/result', '*')) {
        return;
    }

    $rectorConfig->rule(ResultRector::class);
};
