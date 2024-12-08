<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\CodingStandard;

use Ghostwriter\Revamp\Package\Ghostwriter\CodingStandard\CodingStandardRector;
use Ghostwriter\Revamp\Package\Ghostwriter\CodingStandard\CodingStandardSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(CodingStandardRector::class)]
#[CoversClass(CodingStandardSetProvider::class)]
final class CodingStandardRectorTest extends AbstractTestCase
{
}
