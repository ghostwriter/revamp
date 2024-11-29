<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp\Exception;

use Ghostwriter\Revamp\ExceptionInterface;

final class FixtureDirectoryDoesNotExistException extends \InvalidArgumentException implements ExceptionInterface
{
}
