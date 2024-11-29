<?php

namespace Vendor\Package;

use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function method(): void
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
     * @test
     *
     * @throws Throwable
     */
    public function method(): void
    {
        $this->assertTrue(true);
    }
}
