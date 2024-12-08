<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php70;

use Ghostwriter\Revamp\Package\Php\Php70\Php70Rector;
use Ghostwriter\Revamp\Package\Php\Php70\Php70SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php70Rector::class)]
#[CoversClass(Php70SetProvider::class)]
final class Php70RectorTest extends AbstractTestCase
{
}
