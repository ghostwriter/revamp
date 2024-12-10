<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use Ghostwriter\Revamp\Package\Ghostwriter\EventDispatcher\EventDispatcherRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('ghostwriter/event-dispatcher')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'ghostwriter/event-dispatcher', '*')) {
        return;
    }

    $rectorConfig->rule(EventDispatcherRector::class);
};
