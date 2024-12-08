<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Container;

use Ghostwriter\Revamp\Package\Ghostwriter\Container\ContainerRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Container\ContainerSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ContainerRector::class)]
#[CoversClass(ContainerSetProvider::class)]
final class ContainerRectorTest extends AbstractTestCase
{
}
