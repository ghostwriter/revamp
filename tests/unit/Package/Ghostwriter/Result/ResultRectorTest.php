<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Result;

use Ghostwriter\Revamp\Package\Ghostwriter\Result\ResultRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Result\ResultSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ResultRector::class)]
#[CoversClass(ResultSetProvider::class)]
final class ResultRectorTest extends AbstractTestCase
{
}
