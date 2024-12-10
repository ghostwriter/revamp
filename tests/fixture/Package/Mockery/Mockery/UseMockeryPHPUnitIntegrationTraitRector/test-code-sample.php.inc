<?php

namespace Vendor\Package\Tests;

use Mockery;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
}

final class ExampleTest extends AbstractTestCase
{
    public function test(): void
    {
        $mock = Mockery::mock(Example::class);

        self::assertInstanceOf(Example::class, $mock);
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
        $mock = Mockery::mock(Example::class);

        self::assertInstanceOf(Example::class, $mock);
    }
}
