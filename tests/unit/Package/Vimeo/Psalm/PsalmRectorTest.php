<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Vimeo\Psalm;

use Ghostwriter\Revamp\Package\Vimeo\Psalm\PsalmRector;
use Ghostwriter\Revamp\Package\Vimeo\Psalm\PsalmSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PsalmRector::class)]
#[CoversClass(PsalmSetProvider::class)]
final class PsalmRectorTest extends AbstractTestCase
{
}
