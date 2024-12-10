<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use Ghostwriter\Revamp\Package\Nikic\PhpParser\ParserFactoryCreateMethodRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('nikic/php-parser')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'nikic/php-parser', '*')) {
        return;
    }

    $rectorConfig->rule(ParserFactoryCreateMethodRector::class);
};
