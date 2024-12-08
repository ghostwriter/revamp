<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php82;

use Ghostwriter\Revamp\Package\Php\Php82\Php82Rector;
use Ghostwriter\Revamp\Package\Php\Php82\Php82SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php82Rector::class)]
#[CoversClass(Php82SetProvider::class)]
final class Php82RectorTest extends AbstractTestCase
{
}
