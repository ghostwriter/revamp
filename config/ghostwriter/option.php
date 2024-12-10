<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use Ghostwriter\Revamp\Package\Ghostwriter\Option\OptionRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('ghostwriter/option')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'ghostwriter/option', '*')) {
        return;
    }

    $rectorConfig->rule(OptionRector::class);
};
