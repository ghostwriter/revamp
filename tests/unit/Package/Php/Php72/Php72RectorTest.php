<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php72;

use Ghostwriter\Revamp\Package\Php\Php72\Php72Rector;
use Ghostwriter\Revamp\Package\Php\Php72\Php72SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php72Rector::class)]
#[CoversClass(Php72SetProvider::class)]
final class Php72RectorTest extends AbstractTestCase
{
}
