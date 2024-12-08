<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\PsalmPlugin;

use Ghostwriter\Revamp\Package\Ghostwriter\PsalmPlugin\PsalmPluginRector;
use Ghostwriter\Revamp\Package\Ghostwriter\PsalmPlugin\PsalmPluginSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PsalmPluginRector::class)]
#[CoversClass(PsalmPluginSetProvider::class)]
final class PsalmPluginRectorTest extends AbstractTestCase
{
}
