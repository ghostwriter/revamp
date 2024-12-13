<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use Ghostwriter\Revamp\Package\Ghostwriter\Arm\ArmRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\ExtendMockeryTestCaseRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\HamcrestToPHPUnitRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\MockeryRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\PHPUnitToMockeryRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\ProphecyToMockeryRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\ShouldReceiveToAllowsRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\ShouldReceiveToExpectsRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\UseMockeryPHPUnitIntegrationTraitRector;
use Rector\Config\RectorConfig;

//return RectorConfig::configure()
//    ->withRules([
//        ExtendMockeryTestCaseRector::class,
//        HamcrestToPHPUnitRector::class,
//        MockeryRector::class,
//        PHPUnitToMockeryRector::class,
//        ProphecyToMockeryRector::class,
//        ShouldReceiveToAllowsRector::class,
//        ShouldReceiveToExpectsRector::class,
//        UseMockeryPHPUnitIntegrationTraitRector::class,
//    ])
//;
return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('mockery/mockery')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'mockery/mockery', '^1.6')) {
        return;
    }

    $rectorConfig->rule(ArmRector::class);
    $rectorConfig->rules([
        ExtendMockeryTestCaseRector::class,
        HamcrestToPHPUnitRector::class,
        MockeryRector::class,
        PHPUnitToMockeryRector::class,
        ProphecyToMockeryRector::class,
        ShouldReceiveToAllowsRector::class,
        ShouldReceiveToExpectsRector::class,
        UseMockeryPHPUnitIntegrationTraitRector::class,
    ]);
};
