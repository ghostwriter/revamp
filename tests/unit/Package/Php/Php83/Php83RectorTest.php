<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php83;

use Ghostwriter\Revamp\Package\Php\Php83\Php83Rector;
use Ghostwriter\Revamp\Package\Php\Php83\Php83SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php83Rector::class)]
#[CoversClass(Php83SetProvider::class)]
final class Php83RectorTest extends AbstractTestCase
{
}