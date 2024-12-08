<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php74;

use Ghostwriter\Revamp\Package\Php\Php74\Php74Rector;
use Ghostwriter\Revamp\Package\Php\Php74\Php74SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php74Rector::class)]
#[CoversClass(Php74SetProvider::class)]
final class Php74RectorTest extends AbstractTestCase
{
}
