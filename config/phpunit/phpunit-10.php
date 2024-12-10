<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\After;
use PHPUnit\Framework\Attributes\AfterClass;
use PHPUnit\Framework\Attributes\BackupGlobals;
use PHPUnit\Framework\Attributes\BackupStaticProperties;
use PHPUnit\Framework\Attributes\Before;
use PHPUnit\Framework\Attributes\BeforeClass;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Large;
use PHPUnit\Framework\Attributes\Medium;
use PHPUnit\Framework\Attributes\PostCondition;
use PHPUnit\Framework\Attributes\PreCondition;
use PHPUnit\Framework\Attributes\PreserveGlobalState;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\MockObject\Rule\InvocationOrder;
use PHPUnit\Framework\TestCase;
use Rector\Config\RectorConfig;
use Rector\Php80\Rector\Class_\AnnotationToAttributeRector;
use Rector\Php80\ValueObject\AnnotationToAttribute;
use Rector\PHPUnit\AnnotationsToAttributes\Rector\Class_\AnnotationWithValueToAttributeRector;
use Rector\PHPUnit\ValueObject\AnnotationWithValueToAttribute;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;

return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('phpunit/phpunit')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'phpunit/phpunit', '^10.0')) {
        return;
    }

    // PHPUnit 10.0
    $rectorConfig->ruleWithConfiguration(AnnotationToAttributeRector::class, [
        // @see https://github.com/sebastianbergmann/phpunit/issues/4502
        new AnnotationToAttribute('after', After::class),
        new AnnotationToAttribute('afterClass', AfterClass::class),
        new AnnotationToAttribute('before', Before::class),
        new AnnotationToAttribute('beforeClass', BeforeClass::class),
        // CodeCoverageIgnore attribute is deprecated.
        // @see https://github.com/rectorphp/rector-phpunit/pull/304
        // new AnnotationToAttribute('codeCoverageIgnore', 'PHPUnit\Framework\Attributes\CodeCoverageIgnore'),
        new AnnotationToAttribute('coversNothing', CoversNothing::class),
        new AnnotationToAttribute('doesNotPerformAssertions', DoesNotPerformAssertions::class),
        new AnnotationToAttribute('large', Large::class),
        new AnnotationToAttribute('medium', Medium::class),
        new AnnotationToAttribute('preCondition', PostCondition::class),
        new AnnotationToAttribute('postCondition', PreCondition::class),
        new AnnotationToAttribute('runInSeparateProcess', RunInSeparateProcess::class),
        new AnnotationToAttribute('runTestsInSeparateProcesses', RunTestsInSeparateProcesses::class),
        new AnnotationToAttribute('small', Small::class),
        new AnnotationToAttribute('test', Test::class),
    ]);

    $rectorConfig->ruleWithConfiguration(AnnotationWithValueToAttributeRector::class, [
        new AnnotationWithValueToAttribute(
            'backupGlobals',
            BackupGlobals::class,
            [
                'enabled' => true,
                'disabled' => false,
            ],
        ),
        new AnnotationWithValueToAttribute(
            'backupStaticAttributes',
            BackupStaticProperties::class,
            [
                'enabled' => true,
                'disabled' => false,
            ],
        ),
        new AnnotationWithValueToAttribute(
            'preserveGlobalState',
            PreserveGlobalState::class,
            [
                'enabled' => true,
                'disabled' => false,
            ],
        ),
        new AnnotationWithValueToAttribute('depends', Depends::class),
        new AnnotationWithValueToAttribute('group', Group::class),
        new AnnotationWithValueToAttribute('uses', UsesClass::class),
        new AnnotationWithValueToAttribute('testDox', TestDox::class),
        new AnnotationWithValueToAttribute('testdox', TestDox::class),
    ]);

    $rectorConfig->ruleWithConfiguration(RenameMethodRector::class, [
        // https://github.com/sebastianbergmann/phpunit/issues/4087
        new MethodCallRename(Assert::class, 'assertRegExp', 'assertMatchesRegularExpression'),
        // https://github.com/sebastianbergmann/phpunit/issues/5220
        new MethodCallRename(Assert::class, 'assertObjectHasAttribute', 'assertObjectHasProperty'),
        new MethodCallRename(Assert::class, 'assertObjectNotHasAttribute', 'assertObjectNotHasProperty'),
        new MethodCallRename(InvocationOrder::class, 'getInvocationCount', 'numberOfInvocations'),
        // https://github.com/sebastianbergmann/phpunit/issues/4090
        new MethodCallRename(Assert::class, 'assertNotRegExp', 'assertDoesNotMatchRegularExpression'),
        // https://github.com/sebastianbergmann/phpunit/issues/4078
        new MethodCallRename(Assert::class, 'assertFileNotExists', 'assertFileDoesNotExist'),
        // https://github.com/sebastianbergmann/phpunit/issues/4081
        new MethodCallRename(Assert::class, 'assertFileNotIsReadable', 'assertFileIsNotReadable'),
        // https://github.com/sebastianbergmann/phpunit/issues/4072
        new MethodCallRename(Assert::class, 'assertDirectoryNotIsReadable', 'assertDirectoryIsNotReadable'),
        // https://github.com/sebastianbergmann/phpunit/issues/4075
        new MethodCallRename(Assert::class, 'assertDirectoryNotIsWritable', 'assertDirectoryIsNotWritable'),
        // https://github.com/sebastianbergmann/phpunit/issues/4069
        new MethodCallRename(Assert::class, 'assertDirectoryNotExists', 'assertDirectoryDoesNotExist'),
        // https://github.com/sebastianbergmann/phpunit/issues/4066
        new MethodCallRename(Assert::class, 'assertNotIsWritable', 'assertIsNotWritable'),
        // https://github.com/sebastianbergmann/phpunit/issues/4063
        new MethodCallRename(Assert::class, 'assertNotIsReadable', 'assertIsNotReadable'),
        // https://github.com/sebastianbergmann/phpunit/pull/3687
        new MethodCallRename(MockBuilder::class, 'setMethods', 'onlyMethods'),
        //https://github.com/sebastianbergmann/phpunit/issues/5062
        new MethodCallRename(TestCase::class, 'expectDeprecationMessage', 'expectExceptionMessage'),
        new MethodCallRename(TestCase::class, 'expectDeprecationMessageMatches', 'expectExceptionMessageMatches'),
        new MethodCallRename(TestCase::class, 'expectNoticeMessage', 'expectExceptionMessage'),
        new MethodCallRename(TestCase::class, 'expectNoticeMessageMatches', 'expectExceptionMessageMatches'),
        new MethodCallRename(TestCase::class, 'expectWarningMessage', 'expectExceptionMessage'),
        new MethodCallRename(TestCase::class, 'expectWarningMessageMatches', 'expectExceptionMessageMatches'),
        new MethodCallRename(TestCase::class, 'expectErrorMessage', 'expectExceptionMessage'),
        new MethodCallRename(TestCase::class, 'expectErrorMessageMatches', 'expectExceptionMessageMatches'),
    ]);
};
