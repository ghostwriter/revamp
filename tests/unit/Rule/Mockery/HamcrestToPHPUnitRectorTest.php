<?php

declare(strict_types=1);

namespace Ghostwriter\RevampTests\Rule\Mockery;

use Ghostwriter\Revamp\Rule\Mockery\HamcrestToPHPUnitRector;
use Ghostwriter\RevampTests\AbstractTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(HamcrestToPHPUnitRector::class)]
final class HamcrestToPHPUnitRectorTest extends AbstractTestCase
{
}
