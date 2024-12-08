<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Filesystem;

use Ghostwriter\Revamp\Package\Ghostwriter\Filesystem\FilesystemRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Filesystem\FilesystemSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(FilesystemRector::class)]
#[CoversClass(FilesystemSetProvider::class)]
final class FilesystemRectorTest extends AbstractTestCase
{
}
