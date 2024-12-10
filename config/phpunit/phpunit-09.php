<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use PHPUnit\Framework\TestCase;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('phpunit/phpunit')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'phpunit/phpunit', '^9.0')) {
        return;
    }

    // PHPUnit 9.0

    $rectorConfig->ruleWithConfiguration(RenameMethodRector::class, [
        /** @see https://github.com/sebastianbergmann/phpunit/issues/3957 */
        new MethodCallRename(TestCase::class, 'expectExceptionMessageRegExp', 'expectExceptionMessageMatches'),
    ]);
};
