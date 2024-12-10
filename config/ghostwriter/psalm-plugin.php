<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use Ghostwriter\Revamp\Package\Ghostwriter\PsalmPlugin\PsalmPluginRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('ghostwriter/psalm-plugin')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'ghostwriter/psalm-plugin', '*')) {
        return;
    }

    $rectorConfig->rule(PsalmPluginRector::class);
};
