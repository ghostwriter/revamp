<?php

declare(strict_types=1);

namespace Ghostwriter\RevampTests;

use Ghostwriter\Revamp\Exception\FixtureDirectoryDoesNotExistException;
use PHPUnit\Framework\Attributes\DataProvider;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

use const DIRECTORY_SEPARATOR;

abstract class AbstractTestCase extends AbstractRectorTestCase
{
    /**
     * @var array<class-string<static>,string>
     */
    protected static array $fixturePaths = [];

    #[\Override]
    final public function provideConfigFilePath(): string
    {
        return self::fixtureDirectory('config.php');
    }

    /**
     * @throws \Throwable
     */
    #[DataProvider('provideData')]
    final public function testFixture(string $filePath): void
    {
        $this->doTestFile($filePath);
    }

    public static function currentRuleName(): string
    {
        return \str_replace(__NAMESPACE__ . '\\', '', \mb_substr(static::class, 0, -4));
    }

    final public static function provideData(): \Generator
    {
        foreach (self::yieldFilesFromDirectory(self::fixtureDirectory()) as [$filePath]) {
            yield \str_replace(\dirname(__DIR__) . DIRECTORY_SEPARATOR, '', $filePath) => [$filePath];
        }
    }

    private static function fixtureDirectory(string ...$path): string
    {
        static $fixtureDirectory = null;

        $fixtureDirectory ??= \dirname(
            (new \ReflectionClass(self::class))->getFileName(),
            2
        ) . DIRECTORY_SEPARATOR . 'fixture';

        if (! \array_key_exists(static::class, self::$fixturePaths)) {
            $fixtureFilePath = \implode(DIRECTORY_SEPARATOR, \explode('\\', self::currentRuleName()));

            $realPath = \realpath($fixtureDirectory . DIRECTORY_SEPARATOR . $fixtureFilePath);

            if ($realPath === false) {
                throw new FixtureDirectoryDoesNotExistException(
                    \sprintf(
                        'Fixture directory "%s" does not exist for test case "%s"',
                        $fixtureDirectory,
                        static::class
                    )
                );
            }

            self::$fixturePaths[static::class] = $realPath;
        }

        return self::$fixturePaths[static::class] . DIRECTORY_SEPARATOR . \implode(DIRECTORY_SEPARATOR, $path);
    }
}
