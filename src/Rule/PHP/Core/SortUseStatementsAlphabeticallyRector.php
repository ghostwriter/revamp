<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\PHP\Core;

use Ghostwriter\Revamp\AbstractRevampRector;
use Ghostwriter\RevampTests\Rule\PHP\Core\SortUseStatementsAlphabeticallyRectorTest;
use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Use_;
use Rector\Exception\ShouldNotHappenException;

/**
 * @see SortUseStatementsAlphabeticallyRectorTest
 */
final class SortUseStatementsAlphabeticallyRector extends AbstractRevampRector
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

        \usort($node->stmts, static function ($a, $b): int {
            if (! $a instanceof Use_ || ! $b instanceof Use_) {
                return 0;
            }

            return $a->uses[0]->name->toString() <=> $b->uses[0]->name->toString();
        });

        //        $node->setAttribute('origNode', null);

        return $node;
    }
}
