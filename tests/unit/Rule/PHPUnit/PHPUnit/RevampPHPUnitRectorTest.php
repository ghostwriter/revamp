<?php

declare(strict_types=1);

namespace Ghostwriter\RevampTests\Rule\PHPUnit\PHPUnit;

use Ghostwriter\Revamp\Rule\PHPUnit\PHPUnit\RevampPHPUnitRector;
use Ghostwriter\RevampTests\AbstractTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(RevampPHPUnitRector::class)]
final class RevampPHPUnitRectorTest extends AbstractTestCase
{
}
