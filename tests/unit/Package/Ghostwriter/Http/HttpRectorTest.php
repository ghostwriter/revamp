<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Http;

use Ghostwriter\Revamp\Package\Ghostwriter\Http\HttpRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Http\HttpSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(HttpRector::class)]
#[CoversClass(HttpSetProvider::class)]
final class HttpRectorTest extends AbstractTestCase
{
}
