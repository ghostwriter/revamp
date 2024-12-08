<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php80;

use Ghostwriter\Revamp\Package\Php\Php80\Php80Rector;
use Ghostwriter\Revamp\Package\Php\Php80\Php80SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php80Rector::class)]
#[CoversClass(Php80SetProvider::class)]
final class Php80RectorTest extends AbstractTestCase
{
}
