<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Phormat;

use Ghostwriter\Revamp\Package\Ghostwriter\Phormat\PhormatRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Phormat\PhormatSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PhormatRector::class)]
#[CoversClass(PhormatSetProvider::class)]
final class PhormatRectorTest extends AbstractTestCase
{
}
