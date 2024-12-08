<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Mockery\Mockery;

use Ghostwriter\Revamp\Package\Mockery\Mockery\MockeryRector;
use Ghostwriter\Revamp\Package\Mockery\Mockery\MockerySetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(MockeryRector::class)]
#[CoversClass(MockerySetProvider::class)]
final class MockeryRectorTest extends AbstractTestCase
{
}
