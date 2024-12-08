<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php84;

use Ghostwriter\Revamp\Package\Php\Php84\Php84Rector;
use Ghostwriter\Revamp\Package\Php\Php84\Php84SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php84Rector::class)]
#[CoversClass(Php84SetProvider::class)]
final class Php84RectorTest extends AbstractTestCase
{
}
