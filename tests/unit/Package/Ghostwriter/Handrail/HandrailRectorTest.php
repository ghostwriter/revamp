<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Handrail;

use Ghostwriter\Revamp\Package\Ghostwriter\Handrail\HandrailRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Handrail\HandrailSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(HandrailRector::class)]
#[CoversClass(HandrailSetProvider::class)]
final class HandrailRectorTest extends AbstractTestCase
{
}
