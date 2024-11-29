<?php

declare(strict_types=1);

namespace Vendor\Package\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Example::class)]
#[CoversClass(Example::class)]
final class ExampleTest extends TestCase
{
    #[MyAttr]
    #[MyAttr]
    public $bar;

    #[MyAttr]
    #[MyAttr]
    public function test()
    {
        $mock = $this->createMock(Example::class);

        self::assertInstanceOf(Example::class, $mock);
    }
}

class Example
{
}

#[\Attribute]
class MyAttr
{
}

?>
-----
<?php

declare(strict_types=1);

namespace Vendor\Package\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Example::class)]
final class ExampleTest extends TestCase
{
    #[MyAttr]
    public $bar;

    #[MyAttr]
    public function test()
    {
        $mock = $this->createMock(Example::class);

        self::assertInstanceOf(Example::class, $mock);
    }
}

class Example
{
}

#[\Attribute]
class MyAttr
{
}

?>
