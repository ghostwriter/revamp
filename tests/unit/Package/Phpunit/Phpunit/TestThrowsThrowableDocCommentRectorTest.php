<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Phpunit\Phpunit;

use Ghostwriter\Revamp\Package\Phpunit\Phpunit\TestThrowsThrowableDocCommentRector;
use Ghostwriter\Revamp\Package\Phpunit\Phpunit\PhpunitSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestThrowsThrowableDocCommentRector::class)]
#[CoversClass(PhpunitSetProvider::class)]
final class TestThrowsThrowableDocCommentRectorTest extends AbstractTestCase
{
}
