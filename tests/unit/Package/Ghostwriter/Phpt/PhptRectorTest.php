<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Phpt;

use Ghostwriter\Revamp\Package\Ghostwriter\Phpt\PhptRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Phpt\PhptSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PhptRector::class)]
#[CoversClass(PhptSetProvider::class)]
final class PhptRectorTest extends AbstractTestCase
{
}
