<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule;

use Ghostwriter\Revamp\AbstractRevampRector;
use Ghostwriter\RevampTests\Rule\RemoveDuplicateAttributesRectorTest;
use PhpParser\Node;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Property;
use Rector\Exception\ShouldNotHappenException;

/**
 * @see RemoveDuplicateAttributesRectorTest
 */
final class RemoveDuplicateAttributesRector extends AbstractRevampRector
{
    /**
     * @return array<class-string<Node>>
     */
    #[\Override]
    public function getNodeTypes(): array
    {
        return [ClassLike::class, ClassMethod::class, Class_::class, Param::class, Property::class];
    }

    /**
     * @param Class_|ClassLike|ClassMethod|Param|Property $node
     *
     * @throws ShouldNotHappenException
     */
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        $uniqueAttributes = [];

        foreach ($node->attrGroups as $i => $attrGroup) {

            $attributeName = $this->standard->prettyPrint($attrGroup->attrs);

            if (\array_key_exists($attributeName, $uniqueAttributes)) {
                continue;
            }

            $uniqueAttributes[$attributeName] = $attrGroup;
        }

        $node->attrGroups = \array_values($uniqueAttributes);

        return $node;
    }
}
