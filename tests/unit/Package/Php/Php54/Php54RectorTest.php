<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php54;

use Ghostwriter\Revamp\Package\Php\Php54\Php54Rector;
use Ghostwriter\Revamp\Package\Php\Php54\Php54SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php54Rector::class)]
#[CoversClass(Php54SetProvider::class)]
final class Php54RectorTest extends AbstractTestCase
{
}
