<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Json;

use Ghostwriter\Revamp\Package\Ghostwriter\Json\JsonRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Json\JsonSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(JsonRector::class)]
#[CoversClass(JsonSetProvider::class)]
final class JsonRectorTest extends AbstractTestCase
{
}