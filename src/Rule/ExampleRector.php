<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule;

use Override;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Ghostwriter\RevampTests\Rule\ExampleRector\ExampleRectorTest
 */
final class ExampleRector extends AbstractRector
{
    /**
     * @return array<class-string<Class_>>
     */
    #[Override]
    public function getNodeTypes(): array
    {
        return [Class_::class];
    }

    #[Override]
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition('// @todo fill the description', [
            new CodeSample(
                <<<'CODE_SAMPLE'
                    // @todo fill code before
                    CODE_SAMPLE
                ,
                <<<'CODE_SAMPLE'
                    // @todo fill code after
                    CODE_SAMPLE
            ),
        ]);
    }

    /**
     * @param Class_ $node
     */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        // @todo change the node

        return $node;
    }
}
