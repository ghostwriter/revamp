<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Mockery\Mockery;

use Ghostwriter\Revamp\Package\Mockery\Mockery\HamcrestToPhpunitRector;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(HamcrestToPhpunitRector::class)]
final class HamcrestToPhpunitRectorTest extends AbstractTestCase
{
}
