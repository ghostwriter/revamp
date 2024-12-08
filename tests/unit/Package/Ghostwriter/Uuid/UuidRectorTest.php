<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Uuid;

use Ghostwriter\Revamp\Package\Ghostwriter\Uuid\UuidRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Uuid\UuidSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(UuidRector::class)]
#[CoversClass(UuidSetProvider::class)]
final class UuidRectorTest extends AbstractTestCase
{
}
