<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Php\Php53;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use PhpParser\Node\Scalar\String_;
use Tests\Unit\Rule\PHP\Core\ReplaceUnnecessaryDoubleQuotesRectorTest;
use Throwable;

/**
 * @see ReplaceUnnecessaryDoubleQuotesRectorTest
 */
final class ReplaceUnnecessaryDoubleQuotesRector extends AbstractRevampRector
{
    /**
     * @return array<class-string<Node>>
     */
    #[Override]
    public function getNodeTypes(): array
    {
        return [String_::class];
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof String_) {
            return null;
        }

        if ($node->getAttribute('kind') !== $node::KIND_DOUBLE_QUOTED) {
            return null;
        }

        if (\str_contains($node->value, '\\')) {
            return null;
        }

        $node->setAttribute('kind', String_::KIND_SINGLE_QUOTED);

        $node->setAttribute('origNode', null);

        return $node;
    }
}
