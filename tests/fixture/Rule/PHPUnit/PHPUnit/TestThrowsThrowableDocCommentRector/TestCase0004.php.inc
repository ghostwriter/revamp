<?php

namespace Vendor\Package;

use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    /**
     * @throws \Throwable
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

final class ExampleTest extends TestCase
{
    /**
     * @throws \Throwable
     */
    public function method(): void
    {
        $this->assertTrue(true);
    }
}
