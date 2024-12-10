<?php

namespace Vendor\Package;

use Mockery;
use PHPUnit\Framework\TestCase;
use Throwable;
use stdClass;

final class ExampleTest extends TestCase
{
    /**
     * @throws Throwable
     */
    public function testMethod(): void
    {
        $mock = Mockery::mock();

        $mock->expects('foo')
             ->with(equalTo(1));
    }
}
-----
<?php

namespace Vendor\Package;

use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery;
use Throwable;
use stdClass;

final class ExampleTest extends MockeryTestCase
{
    /**
     * @throws Throwable
     */
    public function testMethod(): void
    {
        $mock = Mockery::mock();

        $mock->expects('foo')
             ->with(self::equalTo(1));
    }
}
