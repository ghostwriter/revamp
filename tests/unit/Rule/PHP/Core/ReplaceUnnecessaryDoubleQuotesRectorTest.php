<?php

declare(strict_types=1);

namespace Ghostwriter\RevampTests\Rule\PHP\Core;

use Ghostwriter\Revamp\Rule\PHP\Core\ReplaceUnnecessaryDoubleQuotesRector;
use Ghostwriter\RevampTests\AbstractTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ReplaceUnnecessaryDoubleQuotesRector::class)]
final class ReplaceUnnecessaryDoubleQuotesRectorTest extends AbstractTestCase
{
}
