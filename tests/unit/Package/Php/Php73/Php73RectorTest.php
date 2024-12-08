<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php73;

use Ghostwriter\Revamp\Package\Php\Php73\Php73Rector;
use Ghostwriter\Revamp\Package\Php\Php73\Php73SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php73Rector::class)]
#[CoversClass(Php73SetProvider::class)]
final class Php73RectorTest extends AbstractTestCase
{
}
