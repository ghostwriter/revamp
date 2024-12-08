<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Php\Php56;

use Ghostwriter\Revamp\Package\Php\Php56\Php56Rector;
use Ghostwriter\Revamp\Package\Php\Php56\Php56SetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Php56Rector::class)]
#[CoversClass(Php56SetProvider::class)]
final class Php56RectorTest extends AbstractTestCase
{
}
