<?php

declare(strict_types=1);

namespace Ghostwriter\RevampTests\Rule\ExampleRector;

use Ghostwriter\Revamp\Rule\ExampleRector;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Throwable;

#[CoversClass(ExampleRector::class)]
final class ExampleRectorTest extends AbstractRectorTestCase
{
    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/configured_rule.php';
    }

    /**
     * @throws Throwable
     */
    #[DataProvider('provideData')]
    public function testRector(string $filePath): void
    {
        $this->doTestFile($filePath);
    }

    public static function provideData(): iterable
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
}
