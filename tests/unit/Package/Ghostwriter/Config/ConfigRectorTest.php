<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Config;

use Ghostwriter\Revamp\Package\Ghostwriter\Config\ConfigRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Config\ConfigSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ConfigRector::class)]
#[CoversClass(ConfigSetProvider::class)]
final class ConfigRectorTest extends AbstractTestCase
{
}
