<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Mezzio\MezzioTemplate;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampMezzioTemplateRectorTest
 */
final class RevampMezzioTemplateRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
