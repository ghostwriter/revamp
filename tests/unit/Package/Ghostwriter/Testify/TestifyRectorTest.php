<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Testify;

use Ghostwriter\Revamp\Package\Ghostwriter\Testify\TestifyRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Testify\TestifySetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestifyRector::class)]
#[CoversClass(TestifySetProvider::class)]
final class TestifyRectorTest extends AbstractTestCase
{
}
