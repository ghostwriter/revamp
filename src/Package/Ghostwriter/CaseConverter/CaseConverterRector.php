<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Ghostwriter\CaseConverter;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use Tests\Unit\Package\Ghostwriter\CaseConverter\CaseConverterRectorTest;

/**
 * @see CaseConverterRectorTest
 */
final class CaseConverterRector extends AbstractRevampRector
{
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
