<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Rule\Psr\HttpClient;

use Ghostwriter\Revamp\AbstractRevampRector;
use PhpParser\Node;

/**
 * @see RevampHttpClientRectorTest
 */
final class RevampHttpClientRector extends AbstractRevampRector
{
    #[\Override]
    public function refactor(Node $node): ?Node
    {
        return $node;
    }
}
