<?php

namespace Vendor\Package;

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
        $obj = new stdClass();

        assertThat($obj, anObject());

        assertThat(new stdClass(), anObject());
    }
}
-----
<?php

namespace Vendor\Package;

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
        $obj = new stdClass();

        self::assertIsObject($obj);

        self::assertIsObject(new stdClass());
    }
}
