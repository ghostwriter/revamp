<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php81;

use Ghostwriter\Revamp\Package\Php\Php81\Php81Rector;
use Ghostwriter\Revamp\Package\Php\Php81\Php81SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php81Rector::class)]
#[CoversClass(Php81SetProvider::class)]
final class Php81RectorTest extends AbstractTestCase
{
}
