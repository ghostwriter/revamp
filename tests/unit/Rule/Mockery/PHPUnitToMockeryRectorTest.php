<?php

declare(strict_types=1);

namespace Ghostwriter\RevampTests\Rule\Mockery;

use Ghostwriter\Revamp\Rule\Mockery\PHPUnitToMockeryRector;
use Ghostwriter\RevampTests\AbstractTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(PHPUnitToMockeryRector::class)]
final class PHPUnitToMockeryRectorTest extends AbstractTestCase
{
}
