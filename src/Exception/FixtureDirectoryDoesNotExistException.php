<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Exception;

use Ghostwriter\Revamp\ExceptionInterface;
use InvalidArgumentException;

final class FixtureDirectoryDoesNotExistException extends InvalidArgumentException implements ExceptionInterface
{
}
