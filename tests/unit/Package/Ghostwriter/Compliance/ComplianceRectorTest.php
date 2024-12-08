<?php

declare(strict_types=1);

namespace Tests\Unit\Package\Ghostwriter\Compliance;

use Ghostwriter\Revamp\Package\Ghostwriter\Compliance\ComplianceRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Compliance\ComplianceSetProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ComplianceRector::class)]
#[CoversClass(ComplianceSetProvider::class)]
final class ComplianceRectorTest extends AbstractTestCase
{
}
