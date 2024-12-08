<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Nikic\PhpParser;

use Ghostwriter\Revamp\Package\Nikic\PhpParser\PhpParserRector;
use Ghostwriter\Revamp\Package\Nikic\PhpParser\PhpParserSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PhpParserRector::class)]
#[CoversClass(PhpParserSetProvider::class)]
final class PhpParserRectorTest extends AbstractTestCase
{
}
