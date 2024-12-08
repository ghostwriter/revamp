<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php85;

use Ghostwriter\Revamp\Package\Php\Php85\Php85Rector;
use Ghostwriter\Revamp\Package\Php\Php85\Php85SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php85Rector::class)]
#[CoversClass(Php85SetProvider::class)]
final class Php85RectorTest extends AbstractTestCase
{
}
