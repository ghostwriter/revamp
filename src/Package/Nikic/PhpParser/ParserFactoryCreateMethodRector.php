<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Nikic\PhpParser;

use Ghostwriter\Revamp\AbstractRevampRector;
use Override;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Scalar\String_;
use PhpParser\ParserFactory;
use PhpParser\PhpVersion;
use PHPStan\Type\ObjectType;
use Tests\Unit\Package\Nikic\PhpParser\ParserFactoryCreateMethodRectorTest;

/**
 * @see ParserFactoryCreateMethodRectorTest
 */
final class ParserFactoryCreateMethodRector extends AbstractRevampRector
{
    /**
     * @return array<class-string<Node>>
     */
    #[Override]
    public function getNodeTypes(): array
    {
        return [MethodCall::class];
    }

    #[Override]
    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof MethodCall) {
            return null;
        }

        if (! $this->isObjectType($node->var, new ObjectType(ParserFactory::class))) {
            return null;
        }

        if (! $this->isName($node->name, 'create')) {
            return null;
        }

        // \dump_node($node);

        $args = $node->getArgs();

        if ($args === []) {
            return null;
        }

        $value = $this->valueResolver->getValue($args[0]->value);
        //        const PREFER_PHP7 = 1;
        //        const ONLY_PHP7 = 3;
        if (
            $value === 1
            || $value === 3
            || $value === ParserFactory::class . '::PREFER_PHP7'
            || $value === ParserFactory::class . '::ONLY_PHP7'
        ) {
            $node->name = new Identifier('createForNewestSupportedVersion');
            $node->args = [];

            return $node;
        }

        //        const PREFER_PHP5 = 2;
        //        const ONLY_PHP5 = 4;
        if (
            $value === 2
            || $value === 4
            || $value === ParserFactory::class . '::PREFER_PHP5'
            || $value === ParserFactory::class . '::ONLY_PHP5'
        ) {
            $node->name = new Identifier('createForVersion');

            $fullyQualified = new FullyQualified(PhpVersion::class);

            $fromStringStaticCall = new StaticCall($fullyQualified, 'fromString', [new Arg(new String_('5.6'))]);

            $node->args = [new Arg($fromStringStaticCall)];

            return $node;
        }

        return null;
    }
}
