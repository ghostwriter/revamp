<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule;

use Ghostwriter\Revamp\AbstractRevampRector;
use Ghostwriter\RevampTests\Rule\SortClassLikeStatementsAlphabeticallyRectorTest;
use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\Namespace_;
use Rector\Exception\ShouldNotHappenException;

/**
 * @see SortClassLikeStatementsAlphabeticallyRectorTest
 */
final class SortClassLikeStatementsAlphabeticallyRector extends AbstractRevampRector
{
    /**
     * @return array<class-string<Node>>
     */
    #[\Override]
    public function getNodeTypes(): array
    {
        return [Namespace_::class];
    }

    /**
     * @param Array_ $node
     *
     * @throws ShouldNotHappenException
     */
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof Namespace_) {
            return null;
        }

        \usort($node->stmts, static function (Node $a, Node $b): int {
            if (! $a instanceof ClassLike) {
                return 0;
            }

            if (! $b instanceof ClassLike) {
                return 0;
            }

            return $a->name?->toString() <=> $b->name?->toString();
        });

        //        $node->setAttribute('kind', Array_::KIND_SHORT);

        $node->setAttribute('origNode', null);

        return $node;
    }
}
