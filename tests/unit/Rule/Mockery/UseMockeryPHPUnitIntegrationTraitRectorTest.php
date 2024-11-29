<?php

declare(strict_types=1);

namespace Ghostwriter\RevampTests\Rule\Mockery;

use Ghostwriter\Revamp\Rule\Mockery\UseMockeryPHPUnitIntegrationTraitRector;
use Ghostwriter\RevampTests\AbstractTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(UseMockeryPHPUnitIntegrationTraitRector::class)]
final class UseMockeryPHPUnitIntegrationTraitRectorTest extends AbstractTestCase
{
}
