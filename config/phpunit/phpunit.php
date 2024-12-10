<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use Ghostwriter\Revamp\Package\Phpunit\Phpunit\TestThrowsThrowableDocCommentRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('phpunit/phpunit')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'phpunit/phpunit', '*')) {
        return;
    }

    $rectorConfig->rule(TestThrowsThrowableDocCommentRector::class);
};
