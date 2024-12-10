<?php

namespace Vendor\Package\Tests;

use Mockery;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
}

final class ExampleTest extends AbstractTestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function test(): void
    {
        $mock = Mockery::mock(TestCase::class);

        self::assertInstanceOf(TestCase::class, $mock);
    }
}
-----
<?php

namespace Vendor\Package\Tests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Throwable;
use Mockery;
use PHPUnit\Framework\TestCase;

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
        $mock = Mockery::mock(TestCase::class);

        self::assertInstanceOf(TestCase::class, $mock);
    }
}
