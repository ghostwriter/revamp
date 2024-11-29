<?php

declare(strict_types=1);

namespace Ghostwriter\RevampTests\Rule\PHPUnit\PHPUnit;

use Ghostwriter\Revamp\Rule\PHPUnit\Phpunit\TestThrowsThrowableDocCommentRector;
use Ghostwriter\RevampTests\AbstractTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(TestThrowsThrowableDocCommentRector::class)]
final class TestThrowsThrowableDocCommentRectorTest extends AbstractTestCase
{
}
