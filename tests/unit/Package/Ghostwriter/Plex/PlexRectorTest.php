<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Plex;

use Ghostwriter\Revamp\Package\Ghostwriter\Plex\PlexRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Plex\PlexSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PlexRector::class)]
#[CoversClass(PlexSetProvider::class)]
final class PlexRectorTest extends AbstractTestCase
{
}
