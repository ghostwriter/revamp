<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php71;

use Ghostwriter\Revamp\Package\Php\Php71\Php71Rector;
use Ghostwriter\Revamp\Package\Php\Php71\Php71SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php71Rector::class)]
#[CoversClass(Php71SetProvider::class)]
final class Php71RectorTest extends AbstractTestCase
{
}
