<?php

declare(strict_types=1);

namespace Ghostwriter\RevampTests\Rule\PHP\PHP80;

use Ghostwriter\Revamp\Rule\PHP\PHP80\RevampPHP80Rector;
use Ghostwriter\RevampTests\AbstractTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(RevampPHP80Rector::class)]
final class RevampPHP80RectorTest extends AbstractTestCase
{
}
