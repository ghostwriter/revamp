<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php53;

use Ghostwriter\Revamp\Package\Php\Php53\Php53Rector;
use Ghostwriter\Revamp\Package\Php\Php53\Php53SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php53Rector::class)]
#[CoversClass(Php53SetProvider::class)]
final class Php53RectorTest extends AbstractTestCase
{
}
