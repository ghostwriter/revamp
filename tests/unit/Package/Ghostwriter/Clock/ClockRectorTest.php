<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Clock;

use Ghostwriter\Revamp\Package\Ghostwriter\Clock\ClockRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Clock\ClockSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ClockRector::class)]
#[CoversClass(ClockSetProvider::class)]
final class ClockRectorTest extends AbstractTestCase
{
}