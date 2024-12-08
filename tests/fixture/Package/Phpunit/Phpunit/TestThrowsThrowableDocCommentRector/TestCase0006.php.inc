<?php

namespace Vendor\Package;

use PHPUnit\Framework\TestCase;
use Throwable;

final class ExampleTest extends TestCase
{
    /**
     * @throws Throwable
     */
    public function method(): void
    {
        $this->assertTrue(true);
    }
}
-----
<?php

namespace Vendor\Package;

use PHPUnit\Framework\TestCase;
use Throwable;

final class ExampleTest extends TestCase
{
    /**
     * @throws Throwable
     */
    public function method(): void
    {
        $this->assertTrue(true);
    }
}
