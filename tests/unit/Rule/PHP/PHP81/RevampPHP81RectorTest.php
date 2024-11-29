<?php

declare(strict_types=1);

namespace Ghostwriter\RevampTests\Rule\PHP\PHP81;

use Ghostwriter\Revamp\Rule\PHP\PHP81\RevampPHP81Rector;
use Ghostwriter\RevampTests\AbstractTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(RevampPHP81Rector::class)]
final class RevampPHP81RectorTest extends AbstractTestCase
{
}
