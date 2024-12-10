<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use Ghostwriter\Revamp\Package\Vimeo\Psalm\PsalmRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('vimeo/psalm')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'vimeo/psalm', '*')) {
        return;
    }

    $rectorConfig->rule(PsalmRector::class);
};
