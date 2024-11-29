<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Exception;

use Ghostwriter\Revamp\ExceptionInterface;

final class UseStatementNotFoundException extends \InvalidArgumentException implements ExceptionInterface
{
}
