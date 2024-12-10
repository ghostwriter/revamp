<?php

declare(strict_types=1);

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\Filesystem\Filesystem;

require_once __DIR__ . '/vendor/autoload.php';

$filesystem = Filesystem::new();
$caseConverter = CaseConverter::new();

function pascalCase(string $name): string
{
    static $caseConverter;
    $caseConverter ??= CaseConverter::new();
    return $caseConverter->pascalCase($name);
    //    return \str_replace(['Phpunit', 'Php'], ['PHPUnit', 'PHP'], $caseConverter->pascalCase($name));
}

function kebabCase(string $name): string
{
    static $caseConverter;
    $caseConverter ??= CaseConverter::new();
    return \str_replace(['p-h-p-unit', 'p-h-p'], ['phpunit', 'php'], $caseConverter->kebabCase($name));
}

$rootDirectory = __DIR__;

$composerJsonFile = $rootDirectory . \DIRECTORY_SEPARATOR . 'composer.json';

$configDirectory = $rootDirectory . \DIRECTORY_SEPARATOR . 'config';
$resourceDirectory = $rootDirectory . \DIRECTORY_SEPARATOR . 'resource';
$sourceDirectory = $rootDirectory . \DIRECTORY_SEPARATOR . 'src';
$testDirectory = $rootDirectory . \DIRECTORY_SEPARATOR . 'tests';

$stubDirectory = $resourceDirectory . \DIRECTORY_SEPARATOR . 'stubs';
$fixtureDirectory = $testDirectory . \DIRECTORY_SEPARATOR . 'fixture';

$fixtureStub = $filesystem->read($stubDirectory . \DIRECTORY_SEPARATOR . 'fixture.txt');
$configStub = $filesystem->read($stubDirectory . \DIRECTORY_SEPARATOR . 'config.txt');
$ruleStub = $filesystem->read($stubDirectory . \DIRECTORY_SEPARATOR . 'rule.txt');
$testStub = $filesystem->read($stubDirectory . \DIRECTORY_SEPARATOR . 'test.txt');

$projects = [
    'ghostwriter' => [
        'arm' => [],
        'case-converter' => [],
        'cli' => [],
        'clock' => [],
        'coding-standard' => [],
        'collection' => [],
        'compliance' => [],
        'config' => [],
        'container' => [],
        'environment' => [],
        'event-dispatcher' => [],
        'filesystem' => [],
        'gfm' => [],
        'handrail' => [],
        'http' => [],
        'json' => [],
        'option' => [],
        'phormat' => [],
        'phpt' => [],
        'plex' => [],
        'psalm-plugin' => [],
        'result' => [],
        'revamp' => [],
        'shell' => [],
        'testify' => [],
        'uuid' => [],
    ],
    'mockery' => [
        'mockery' => [
            '*' => [
                \pascalCase('Extend Mockery TestCase'),
                \pascalCase('Hamcrest To PHPUnit'),
                \pascalCase('Mockery'),
                \pascalCase('PHPUnit To Mockery'),
                \pascalCase('Prophecy To Mockery'),
                \pascalCase('Should Receive To Allows'),
                \pascalCase('Should Receive To Expects'),
                \pascalCase('Use Mockery PHPUnit Integration Trait'),
            ],
        ],
    ],
    //    'mezzio' => [
    //        'mezzio' => [],
    //        'mezzio-authentication' => [],
    //        'mezzio-authentication-basic' => [],
    //        'mezzio-authentication-laminasauthentication' => [],
    //        'mezzio-authentication-oauth2' => [],
    //        'mezzio-authentication-session' => [],
    //        'mezzio-authorization' => [],
    //        'mezzio-authorization-acl' => [],
    //        'mezzio-authorization-rbac' => [],
    //        'mezzio-cors' => [],
    //        'mezzio-csrf' => [],
    //        'mezzio-fastroute' => [],
    //        'mezzio-flash' => [],
    //        'mezzio-hal' => [],
    //        'mezzio-helpers' => [],
    //        'mezzio-laminasrouter' => [],
    //        'mezzio-laminasviewrenderer' => [],
    //        'mezzio-migration' => [],
    //        'mezzio-platesrenderer' => [],
    //        'mezzio-problem-details' => [],
    //        'mezzio-router' => [],
    //        'mezzio-session' => [],
    //        'mezzio-session-cache' => [],
    //        'mezzio-session-ext' => [],
    //        'mezzio-skeleton' => [],
    //        'mezzio-swoole' => [],
    //        'mezzio-template' => [],
    //        'mezzio-tooling' => [],
    //        'mezzio-twigrenderer' => [],
    //    ],
    'nikic' => [
        'php-parser' => [
            '5.0' => [\pascalCase('Parser Factory create method')],
        ],
    ],
    'php' => [
        'php' => [
            '*' => [
                \pascalCase('Replace Unnecessary Double Quotes'),
                \pascalCase('SortClassLikeStatementsAlphabetically'),
                \pascalCase('SortUseStatementsAlphabetically'),
            ],
        ],
        'php80' => [],
        'php81' => [],
        'php82' => [],
        'php83' => [],
        'php84' => [],
        'php85' => [],
    ],
    'phpunit' => [
        'phpunit' => [
            '*' => ['TestThrowsThrowableDocComment'],
        ],
    ],
    //    'psr' => [
    //        'cache' => [],
    //        'clock' => [],
    //        'container' => [],
    //        'event-dispatcher' => [],
    //        'http-client' => [],
    //        'http-factory' => [],
    //        'http-message' => [],
    //        'http-server-handler' => [],
    //        'http-server-middleware' => [],
    //        'link' => [],
    //        'log' => [],
    //        'simple-cache' => [],
    //    ],
    'vimeo' => [
        'psalm' => [],
    ],
];

foreach ($projects as $vendor => $packages) {
    $vendorPascalCase = \pascalCase($vendor);

    foreach ($packages as $package => $rectors) {
        $packagePascalCase = \pascalCase($package);

        if ($rectors === []) {
            $rectors['dev-main'] = [$packagePascalCase];
        }

        foreach ($rectors as $rector) {

            foreach ($rector as $version => $rule) {
                $rulePascalCase = \pascalCase($rule) . 'Rector';
                $testPascalCase = $rulePascalCase . 'Test';
                $setProviderPascalCase = $packagePascalCase . 'SetProvider';

                $configFile = \implode(\DIRECTORY_SEPARATOR, [$configDirectory, $vendor, $package]) . '.php';
                $configContent = \str_replace(
                    ['{{ $setProvider }}', '{{ $vendor }}', '{{ $package }}', '{{ $rule }}', '{{ $test }}'],
                    [$setProviderPascalCase, $vendorPascalCase, $packagePascalCase, $rulePascalCase, $testPascalCase],
                    $configStub,
                );

                if (! $filesystem->exists($configFile)) {
                    $filesystem->write($configFile, $configContent);
                }

                $ruleFile = \implode(
                    \DIRECTORY_SEPARATOR,
                    [$sourceDirectory, 'Package', $vendorPascalCase, $packagePascalCase, $rulePascalCase],
                ) . '.php';

                $ruleContent = \str_replace(
                    ['{{ $setProvider }}', '{{ $vendor }}', '{{ $package }}', '{{ $rule }}', '{{ $test }}'],
                    [$setProviderPascalCase, $vendorPascalCase, $packagePascalCase, $rulePascalCase, $testPascalCase],
                    $ruleStub,
                );

                if (! $filesystem->exists($ruleFile)) {
                    $filesystem->write($ruleFile, $ruleContent);
                }

                $testcaseFile = \implode(
                    \DIRECTORY_SEPARATOR,
                    [$testDirectory, 'Unit', 'Package', $vendorPascalCase, $packagePascalCase, $testPascalCase],
                ) . '.php';

                $testcaseContent = \str_replace(
                    ['{{ $setProvider }}', '{{ $vendor }}', '{{ $package }}', '{{ $rule }}', '{{ $test }}'],
                    [$setProviderPascalCase, $vendorPascalCase, $packagePascalCase, $rulePascalCase, $testPascalCase],
                    $testStub,
                );

                $filesystem->write($testcaseFile, $testcaseContent);

                $set = $vendorPascalCase . $packagePascalCase . $rulePascalCase;
                $group = $packagePascalCase;
                $setFilePath = \str_replace(__DIR__ . \DIRECTORY_SEPARATOR, '', $configFile);

                $testcaseFixtureFile = \implode(
                    \DIRECTORY_SEPARATOR,
                    [$fixtureDirectory, 'Package', $vendorPascalCase, $packagePascalCase, $rulePascalCase, 'testcase'],
                ) . '.php.inc';

                $testcaseFixtureContent = \str_replace(
                    ['{{ $setProvider }}', '{{ $vendor }}', '{{ $package }}', '{{ $rule }}', '{{ $test }}'],
                    [$setProviderPascalCase, $vendorPascalCase, $packagePascalCase, $rulePascalCase, $testPascalCase],
                    $fixtureStub,
                );

                if (! $filesystem->exists($testcaseFixtureFile)) {
                    $filesystem->write($testcaseFixtureFile, $testcaseFixtureContent);
                }

                echo $configFile . \PHP_EOL;
                echo $ruleFile . \PHP_EOL;
                echo $testcaseFile . \PHP_EOL;
                echo $testcaseFixtureFile . \PHP_EOL;
                echo \str_repeat('--', 8) . \PHP_EOL;
            }
        }
    }
}
