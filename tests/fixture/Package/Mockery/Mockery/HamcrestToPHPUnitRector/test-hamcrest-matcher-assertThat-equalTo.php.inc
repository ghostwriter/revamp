<?php

declare(strict_types=1);

namespace Vendor\Package\Tests;

use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function test()
    {
        $mock = $this->createMock(Example::class);

        self::assertInstanceOf(Example::class, $mock);

        \Hamcrest\MatcherAssert::assertThat(
            $mock, equalTo($mock)
        );
    }
}
?>
-----
<?php

declare(strict_types=1);

namespace Vendor\Package\Tests;

use Throwable;
use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    /**
     * @throws Throwable
     */
    public function test()
    {
        $mock = $this->createMock(Example::class);

        self::assertInstanceOf(Example::class, $mock);

        self::assertThat($mock, self::equalTo($mock));
    }
}
?>
