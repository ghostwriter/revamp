<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Option;

use Ghostwriter\Revamp\Package\Ghostwriter\Option\OptionRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Option\OptionSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(OptionRector::class)]
#[CoversClass(OptionSetProvider::class)]
final class OptionRectorTest extends AbstractTestCase
{
}
