<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Ghostwriter\CaseConverter;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampCaseConverterRectorTest
 */
final class RevampCaseConverterRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
