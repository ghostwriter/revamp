<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Mockery\Mockery;

use Ghostwriter\Revamp\Package\Mockery\Mockery\PhpunitToMockeryRector;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PhpunitToMockeryRector::class)]
final class PhpunitToMockeryRectorTest extends AbstractTestCase
{
}
