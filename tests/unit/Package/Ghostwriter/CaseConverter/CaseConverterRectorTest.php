<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\CaseConverter;

use Ghostwriter\Revamp\Package\Ghostwriter\CaseConverter\CaseConverterRector;
use Ghostwriter\Revamp\Package\Ghostwriter\CaseConverter\CaseConverterSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(CaseConverterRector::class)]
#[CoversClass(CaseConverterSetProvider::class)]
final class CaseConverterRectorTest extends AbstractTestCase
{
}
