<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Mockery\Mockery;

use Ghostwriter\Revamp\Package\Mockery\Mockery\PHPUnitToMockeryRector;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PHPUnitToMockeryRector::class)]
final class PHPUnitToMockeryRectorTest extends AbstractTestCase
{
}
