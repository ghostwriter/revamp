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
             ->with(objectValue());
    }
}
-----
<?php

namespace Vendor\Package;

use PHPUnit\Framework\Constraint\IsType;
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
             ->with(new IsType(IsType::TYPE_OBJECT));
    }
}