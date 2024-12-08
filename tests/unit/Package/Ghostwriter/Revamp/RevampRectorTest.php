<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Revamp;

use Ghostwriter\Revamp\Package\Ghostwriter\Revamp\RevampRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Revamp\RevampSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(RevampRector::class)]
#[CoversClass(RevampSetProvider::class)]
final class RevampRectorTest extends AbstractTestCase
{
}
