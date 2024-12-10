<?php

declare(strict_types=1);

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use PhpParser\Modifiers;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\ClosureUse;
use PhpParser\Node\DeclareItem;
use PhpParser\Node\Expr\ArrayItem as ArrayItemExpr;
use PhpParser\Node\Expr\ClosureUse as ClosureUseExpr;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\InterpolatedStringPart;
use PhpParser\Node\PropertyItem;
use PhpParser\Node\Scalar\DNumber;
use PhpParser\Node\Scalar\Encapsed;
use PhpParser\Node\Scalar\EncapsedStringPart;
use PhpParser\Node\Scalar\Float_;
use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Scalar\InterpolatedString;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\StaticVar;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\DeclareDeclare;
use PhpParser\Node\Stmt\PropertyProperty;
use PhpParser\Node\Stmt\StaticVar as StaticVarStmt;
use PhpParser\Node\Stmt\UseUse;
use PhpParser\Node\UseItem;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;

/**
 * @see https://github.com/nikic/PHP-Parser/blob/master/UPGRADE-5.0.md
 */
return static function (RectorConfig $rectorConfig): void {
    if (! InstalledVersions::isInstalled('nikic/php-parser')) {
        return;
    }

    if (! InstalledVersions::satisfies(new VersionParser(), 'nikic/php-parser', '^5.0')) {
        return;
    }

    // https://github.com/nikic/PHP-Parser/blob/master/UPGRADE-5.0.md#renamed-nodes
    $rectorConfig->ruleWithConfiguration(RenameClassRector::class, [
        ArrayItemExpr::class => ArrayItem::class,
        ClosureUseExpr::class => ClosureUse::class,
        StaticVarStmt::class => StaticVar::class,
        DeclareDeclare::class => DeclareItem::class,
        PropertyProperty::class => PropertyItem::class,
        DNumber::class => Float_::class,
        Encapsed::class => InterpolatedString::class,
        EncapsedStringPart::class => InterpolatedStringPart::class,
        LNumber::class => Int_::class,
        UseUse::class => UseItem::class,
    ]);

    // https://github.com/nikic/PHP-Parser/blob/master/UPGRADE-5.0.md#modifiers
    $rectorConfig->ruleWithConfiguration(RenameClassConstFetchRector::class, [
        new RenameClassAndConstFetch(Class_::class, 'MODIFIER_PUBLIC', Modifiers::class, 'PUBLIC'),
        new RenameClassAndConstFetch(Class_::class, 'MODIFIER_PUBLIC', Modifiers::class, 'PUBLIC'),
        new RenameClassAndConstFetch(Class_::class, 'MODIFIER_PROTECTED', Modifiers::class, 'PROTECTED'),
        new RenameClassAndConstFetch(Class_::class, 'MODIFIER_PRIVATE', Modifiers::class, 'PRIVATE'),
        new RenameClassAndConstFetch(Class_::class, 'MODIFIER_STATIC', Modifiers::class, 'STATIC'),
        new RenameClassAndConstFetch(Class_::class, 'MODIFIER_ABSTRACT', Modifiers::class, 'ABSTRACT'),
        new RenameClassAndConstFetch(Class_::class, 'MODIFIER_FINAL', Modifiers::class, 'FINAL'),
        new RenameClassAndConstFetch(Class_::class, 'MODIFIER_READONLY', Modifiers::class, 'READONLY'),
        new RenameClassAndConstFetch(Class_::class, 'VISIBILITY_MODIFIER_MASK', Modifiers::class, 'VISIBILITY_MASK'),
    ]);

    // https://github.com/nikic/PHP-Parser/blob/master/UPGRADE-5.0.md#other-removed-functionality
    $rectorConfig->ruleWithConfiguration(RenameMethodRector::class, [
        new MethodCallRename(MethodCall::class, 'setTypeHint', 'setType'),
    ]);

    // https://github.com/nikic/PHP-Parser/blob/master/UPGRADE-5.0.md#changes-to-the-node-traverser
    $rectorConfig->ruleWithConfiguration(RenameClassConstFetchRector::class, [
        new RenameClassAndConstFetch(NodeTraverser::class, 'REMOVE_NODE', NodeVisitor::class, 'REMOVE_NODE'),
        new RenameClassAndConstFetch(
            NodeTraverser::class,
            'DONT_TRAVERSE_CHILDREN',
            NodeVisitor::class,
            'DONT_TRAVERSE_CHILDREN'
        ),
        new RenameClassAndConstFetch(
            NodeTraverser::class,
            'DONT_TRAVERSE_CURRENT_AND_CHILDREN',
            NodeVisitor::class,
            'DONT_TRAVERSE_CURRENT_AND_CHILDREN'
        ),
        new RenameClassAndConstFetch(NodeTraverser::class, 'STOP_TRAVERSAL', NodeVisitor::class, 'STOP_TRAVERSAL'),
    ]);
};
