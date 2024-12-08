<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Arm;

use Ghostwriter\Revamp\Package\Ghostwriter\Arm\ArmRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Arm\ArmSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ArmRector::class)]
#[CoversClass(ArmSetProvider::class)]
final class ArmRectorTest extends AbstractTestCase
{
}
