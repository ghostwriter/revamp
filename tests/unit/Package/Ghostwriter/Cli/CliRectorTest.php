<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Cli;

use Ghostwriter\Revamp\Package\Ghostwriter\Cli\CliRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Cli\CliSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(CliRector::class)]
#[CoversClass(CliSetProvider::class)]
final class CliRectorTest extends AbstractTestCase
{
}
