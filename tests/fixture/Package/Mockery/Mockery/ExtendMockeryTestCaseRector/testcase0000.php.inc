<?php

declare(strict_types=1);

namespace Vendor\Package\Tests;

use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function test()
    {
        $mock = \mock(Example::class);

        self::assertInstanceOf(Example::class, $mock);
    }
}
?>
-----
<?php

declare(strict_types=1);

namespace Vendor\Package\Tests;

use Mockery\Adapter\Phpunit\MockeryTestCase;
use Throwable;

final class ExampleTest extends MockeryTestCase
{
    /**
     * @throws Throwable
     */
    public function test()
    {
        $mock = \mock(Example::class);

        self::assertInstanceOf(Example::class, $mock);
    }
}
?>
