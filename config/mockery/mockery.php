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
use Ghostwriter\Revamp\Package\Mockery\Mockery\UseMockeryPHPUnitIntegrationTraitRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::satisfies(new VersionParser(), 'mockery/mockery', '*')) {
        return;
    }

    $rectorConfig->rule(ExtendMockeryTestCaseRector::class);
    $rectorConfig->rule(HamcrestToPHPUnitRector::class);
    $rectorConfig->rule(MockeryRector::class);
    $rectorConfig->rule(PHPUnitToMockeryRector::class);
    $rectorConfig->rule(ProphecyToMockeryRector::class);
    $rectorConfig->rule(ShouldReceiveToAllowsRector::class);
    $rectorConfig->rule(ShouldReceiveToExpectsRector::class);
    $rectorConfig->rule(UseMockeryPHPUnitIntegrationTraitRector::class);
};
