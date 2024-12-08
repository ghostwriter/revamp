<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Environment;

use Ghostwriter\Revamp\Package\Ghostwriter\Environment\EnvironmentRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Environment\EnvironmentSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(EnvironmentRector::class)]
#[CoversClass(EnvironmentSetProvider::class)]
final class EnvironmentRectorTest extends AbstractTestCase
{
}
