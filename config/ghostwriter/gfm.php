<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use Ghostwriter\Revamp\Package\Ghostwriter\Gfm\GfmRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('ghostwriter/gfm')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'ghostwriter/gfm', '*')) {
        return;
    }

    $rectorConfig->rule(GfmRector::class);
};
