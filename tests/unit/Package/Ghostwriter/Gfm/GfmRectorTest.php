<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Gfm;

use Ghostwriter\Revamp\Package\Ghostwriter\Gfm\GfmRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Gfm\GfmSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(GfmRector::class)]
#[CoversClass(GfmSetProvider::class)]
final class GfmRectorTest extends AbstractTestCase
{
}
