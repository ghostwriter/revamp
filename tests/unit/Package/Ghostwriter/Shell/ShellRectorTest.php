<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Shell;

use Ghostwriter\Revamp\Package\Ghostwriter\Shell\ShellRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Shell\ShellSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ShellRector::class)]
#[CoversClass(ShellSetProvider::class)]
final class ShellRectorTest extends AbstractTestCase
{
}
