<?php

namespace Vendor\Package\Tests;

use PHPUnit\Framework\TestCase;
use function mock;

abstract class AbstractTestCase extends TestCase
{
}

final class ExampleTest extends AbstractTestCase
{
    public function test(): void
    {
        $mock = mock(TestCase::class);

        self::assertInstanceOf(TestCase::class, $someMock);
    }
}
-----
<?php

namespace Vendor\Package\Tests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Throwable;
use PHPUnit\Framework\TestCase;
use function mock;

abstract class AbstractTestCase extends TestCase
{
}

final class ExampleTest extends AbstractTestCase
{
    use MockeryPHPUnitIntegration;
    /**
     * @throws Throwable
     */
    public function test(): void
    {
        $mock = mock(TestCase::class);

        self::assertInstanceOf(TestCase::class, $someMock);
    }
}
