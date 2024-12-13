<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Exception;

use Ghostwriter\Revamp\Interface\ExceptionInterface;
use LogicException;

final class ShouldNotHappenException extends LogicException implements ExceptionInterface
{
}
