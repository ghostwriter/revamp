<?php

namespace Vendor\Package;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    #[Test]
    public function method(): void
    {
        $this->assertTrue(true);
    }
}
-----
<?php

namespace Vendor\Package;

use Throwable;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    /**
     * @throws Throwable
     */
    #[Test]
    public function method(): void
    {
        $this->assertTrue(true);
    }
}
