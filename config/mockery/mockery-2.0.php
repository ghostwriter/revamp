<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use Ghostwriter\Revamp\Package\Mockery\Mockery\ExtendMockeryTestCaseRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\HamcrestToPHPUnitRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\MockeryRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\PHPUnitToMockeryRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\ProphecyToMockeryRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\ShouldReceiveToAllowsRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\ShouldReceiveToExpectsRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\UseMockeryPhpunitIntegrationTraitRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('mockery/mockery')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'mockery/mockery', '^2.0')) {
        return;
    }

    $rectorConfig->rules([
        ExtendMockeryTestCaseRector::class,
        HamcrestToPHPUnitRector::class,
        MockeryRector::class,
        PHPUnitToMockeryRector::class,
        ProphecyToMockeryRector::class,
        ShouldReceiveToAllowsRector::class,
        ShouldReceiveToExpectsRector::class,
        UseMockeryPhpunitIntegrationTraitRector::class,
    ]);
};
