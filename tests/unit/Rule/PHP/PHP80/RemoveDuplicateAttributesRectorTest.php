<?php

declare(strict_types=1);

namespace Ghostwriter\RevampTests\Rule\PHP\PHP80;

use Ghostwriter\Revamp\Rule\PHP\PHP80\RemoveDuplicateAttributesRector;
use Ghostwriter\RevampTests\AbstractTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(RemoveDuplicateAttributesRector::class)]
final class RemoveDuplicateAttributesRectorTest extends AbstractTestCase
{
}
