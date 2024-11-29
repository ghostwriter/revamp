<?php

namespace Vendor\Package;

use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function testMethod(): void
    {
        $this->assertTrue(true);
    }
}
-----
<?php

namespace Vendor\Package;

use Throwable;
use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    /**
     * @throws Throwable
     */
    public function testMethod(): void
    {
        $this->assertTrue(true);
    }
}
