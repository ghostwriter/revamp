<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Collection;

use Ghostwriter\Revamp\Package\Ghostwriter\Collection\CollectionRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Collection\CollectionSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(CollectionRector::class)]
#[CoversClass(CollectionSetProvider::class)]
final class CollectionRectorTest extends AbstractTestCase
{
}