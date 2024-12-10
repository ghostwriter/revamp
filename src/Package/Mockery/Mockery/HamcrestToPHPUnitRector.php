<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Package\Mockery\Mockery;

use Ghostwriter\Revamp\AbstractRevampRector;
use Hamcrest\MatcherAssert;
use Override;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\CallLike;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\TestCase;
use Rector\Exception\ShouldNotHappenException;
use Tests\Unit\Rule\Mockery\HamcrestToPHPUnitRectorTest;

/**
 * @see HamcrestToPHPUnitRectorTest
 */
final class HamcrestToPHPUnitRector extends AbstractRevampRector
{
    public const array HAMCREST_FUNCTIONS_TO_PHPUnit_CONSTRAINT = [
        // Hamcrest - https://github.com/hamcrest/hamcrest-php
        'allOf' => 'logicalAnd',
        'anArray' => 'isArray',
        'anInstanceOf' => 'isInstanceOf',
        'anObject' =>'assertIsObject',
        'any' =>'wip',
        'anyOf' =>'wip',
        'anything' =>'wip',
        'arrayContaining' =>'wip',
        'arrayContainingInAnyOrder' =>'wip',
        'arrayValue' =>'wip',
        'arrayWithSize' =>'wip',
        'assertThat' => 'assertThat',
        'atLeast' =>'wip',
        'atMost' =>'wip',
        'boolValue' =>'wip',
        'booleanValue' =>'wip',
        'both' =>'wip',
        'callableValue' =>'wip',
        'closeTo' =>'wip',
        'comparesEqualTo' =>'wip',
        'contains' =>'wip',
        'containsInAnyOrder' =>'wip',
        'containsString' =>'wip',
        'containsStringIgnoringCase' =>'wip',
        'describedAs' =>'wip',
        'doubleValue' =>'wip',
        'either' =>'wip',
        'emptyArray' =>'wip',
        'emptyString' =>'wip',
        'emptyTraversable' =>'wip',
        'endsWith' =>'wip',
        'equalTo' =>'equalTo',
        'equalToIgnoringCase' =>'wip',
        'equalToIgnoringWhiteSpace' =>'wip',
        'everyItem' =>'wip',
        'floatValue' =>'wip',
        'greaterThan' =>'wip',
        'greaterThanOrEqualTo' =>'wip',
        'hasEntry' =>'wip',
        'hasItem' =>'wip',
        'hasItemInArray' =>'wip',
        'hasItems' =>'wip',
        'hasKey' =>'wip',
        'hasKeyInArray' =>'wip',
        'hasKeyValuePair' =>'wip',
        'hasToString' =>'wip',
        'hasValue' =>'wip',
        'hasXPath' =>'wip',
        'identicalTo' =>'wip',
        'intValue' =>'wip',
        'integerValue' =>'wip',
        'is' =>'wip',
        'isEmptyOrNullString' =>'wip',
        'isEmptyString' =>'wip',
        'isNonEmptyString' =>'wip',
        'lessThan' =>'wip',
        'lessThanOrEqualTo' =>'wip',
        'matchesPattern' =>'wip',
        'nonEmptyArray' =>'wip',
        'nonEmptyString' =>'wip',
        'nonEmptyTraversable' =>'wip',
        'noneOf' =>'wip',
        'not' =>'wip',
        'notNullValue' =>'wip',
        'notSet' =>'wip',
        'nullOrEmptyString' =>'wip',
        'nullValue' =>'wip',
        'numericValue' =>'TYPE_NUMERIC',
        'objectValue' =>'TYPE_OBJECT',
        'resourceValue' =>'wip',
        'sameInstance' =>'wip',
        'scalarValue' =>'wip',
        'set' =>'wip',
        'startsWith' =>'wip',
        'stringContainsInOrder' =>'wip',
        'stringValue' =>'wip',
        'traversableWithSize' =>'wip',
        'typeOf'=>'wip',
        MatcherAssert::class . '::assertThat'=>'assertThat',
    ];

    /**
     * @return array<class-string<CallLike>>
     */
    #[Override]
    public function getNodeTypes(): array
    {
        TestCase::assertNotFalse(true);

        return [CallLike::class];
    }

    /**
     * @param Class_ $node
     */
    #[Override]
    public function refactor(Node $node): ?Node
    {
        return match (true) {
            $node instanceof CallLike => $this->refactorCallLike($node),
            default => null,
        };
    }

    public function refactorCallLike(CallLike $callLike): ?CallLike
    {
        return match (true) {
            $callLike instanceof MethodCall => $this->refactorMethodCall($callLike),
            $callLike instanceof StaticCall => $this->refactorStaticCall($callLike),
            $callLike instanceof FuncCall => $this->refactorFuncCall($callLike),
            default => null,
        };
    }

    public function refactorFuncCall(FuncCall $funcCall): ?Node
    {
        // dump_node($node);

        $functionName = $this->getName($funcCall);

        if (! \array_key_exists($functionName, self::HAMCREST_FUNCTIONS_TO_PHPUnit_CONSTRAINT)) {
            return null;
        }

        return match ($functionName) {
            'assertThat' => $this->refactorAssertThatFuncCall($funcCall),
            'anObject' => $this->refactorAnObjectFuncCall($funcCall),
            'objectValue' => $this->refactorObjectValueFuncCall($funcCall),
            'equalTo' => $this->refactorEqualToFuncCall($funcCall),
            'numericValue' => $this->refactorNumericValueFuncCall($funcCall),
            default => throw new ShouldNotHappenException($functionName),
        };
    }

    public function refactorMethodCall(MethodCall $methodCall): ?CallLike
    {
        //        dump_node($node);

        return $methodCall;
    }

    public function refactorStaticCall(StaticCall $staticCall): ?CallLike
    {
        $className = $this->getName($staticCall->class) ?? 'not-found';
        $functionName = $this->getName($staticCall->name) ?? 'not-found';

        $fullyQualifiedFunctionName = $className . '::' . $functionName;
        if (! \array_key_exists($fullyQualifiedFunctionName, self::HAMCREST_FUNCTIONS_TO_PHPUnit_CONSTRAINT)) {
            return null;
        }

        // dump_node($node);

        return $this->createStaticCall(
            'self',
            self::HAMCREST_FUNCTIONS_TO_PHPUnit_CONSTRAINT[$fullyQualifiedFunctionName],
            $staticCall->args
        );
    }

    private function addNodeBeforeNode(FuncCall $funcCall, MethodCall $methodCall): void
    {
        $parent = $funcCall->getAttribute('parent');

        if ($parent === null) {
            return;
        }

        \dump_node($parent);

        //        $parent->setAttribute('stmts', array_merge(
        //            array_slice($parent->stmts, 0, array_search($funcCall, $parent->stmts, true)),
        //            [$methodCall],
        //            array_slice($parent->stmts, array_search($funcCall, $parent->stmts, true))
        //        ));
    }

    private function createMethodCall(Expr $expr, string $name): MethodCall
    {
        return new MethodCall($expr, $name);
    }

    private function createStaticCall(
        string $class,
        string $method,
        array $args = [],
        array $attributes = [],
    ): StaticCall {
        return new StaticCall(new Name($class), $method, $args);
    }

    private function refactorAnObjectFuncCall(FuncCall $funcCall): ?New_
    {
        $this->importName(IsType::class);

        $name = new Name('IsType');

        return new New_($name, [new Arg(new ClassConstFetch($name, 'TYPE_OBJECT'))]);
    }

    private function refactorAssertThatFuncCall(FuncCall $funcCall): ?CallLike
    {
        // dump_node($node);

        $args = $funcCall->args;

        $argsCount = \count($args);
        if ($argsCount !== 2) {
            return null;
        }

        $secondArg = $args[1]->value;
        if (! $secondArg instanceof FuncCall) {
            return null;
        }

        $secondArgFunctionName = $this->getName($secondArg);
        if (! \array_key_exists($secondArgFunctionName, self::HAMCREST_FUNCTIONS_TO_PHPUnit_CONSTRAINT)) {
            return null;
        }

        return match ($secondArgFunctionName) {
            'anObject' => $this->createStaticCall('self', 'assertIsObject', [$args[0]]),
            'numericValue' => $this->createStaticCall('self', 'assertIsNumeric', [$args[0]]),
            //            'equalTo' => $this->createStaticCall(
            //                'self',
            //                self::HAMCREST_FUNCTIONS_TO_PHPUnit_CONSTRAINT[$secondArgFunctionName],
            //                [
            //                    $args[0],
            //                    $secondArg->args[0],
            //                ]
            //            ),
            default => throw new ShouldNotHappenException($secondArgFunctionName),
        };
    }

    private function refactorEqualToFuncCall(FuncCall $funcCall): ?StaticCall
    {
        $functionName = $this->getName($funcCall);

        if ($functionName === null) {
            return null;
        }

        return $this->createStaticCall(
            'self',
            self::HAMCREST_FUNCTIONS_TO_PHPUnit_CONSTRAINT[$functionName],
            $funcCall->args
        );
    }

    private function refactorNumericValueFuncCall(FuncCall $funcCall): ?New_
    {
        $functionName = $this->getName($funcCall);

        $this->importName(IsType::class);

        $name = new Name('IsType');

        return new New_(
            $name,
            [new Arg(new ClassConstFetch($name, self::HAMCREST_FUNCTIONS_TO_PHPUnit_CONSTRAINT[$functionName]))]
        );
    }

    private function refactorObjectValueFuncCall(FuncCall $funcCall): ?New_
    {
        return $this->refactorAnObjectFuncCall($funcCall);
    }
}
