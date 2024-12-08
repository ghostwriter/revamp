<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\EventDispatcher;

use Ghostwriter\Revamp\Package\Ghostwriter\EventDispatcher\EventDispatcherRector;
use Ghostwriter\Revamp\Package\Ghostwriter\EventDispatcher\EventDispatcherSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(EventDispatcherRector::class)]
#[CoversClass(EventDispatcherSetProvider::class)]
final class EventDispatcherRectorTest extends AbstractTestCase
{
}
