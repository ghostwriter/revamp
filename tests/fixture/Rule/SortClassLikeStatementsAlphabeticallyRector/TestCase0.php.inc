<?php

declare(strict_types=1);

namespace Vendor\Package\Tests;

abstract readonly class CAbstractClass
{
}

trait CTrait
{
}

enum BEnum
{
}

final class ExampleTest
{
}

enum AEnum
{
}

interface CInterface
{
}

trait ATrait
{
}

interface BInterface
{
}
abstract readonly class BAbstractClass
{
}

class BClass
{
}

enum CEnum
{
}
interface AInterface
{
}

class AClass
{
}

abstract class AAbstractClass
{
}

?>
-----
<?php

declare(strict_types=1);

namespace Vendor\Package\Tests;

abstract class AAbstractClass
{
}
class AClass
{
}
enum AEnum
{
}
interface AInterface
{
}
trait ATrait
{
}
abstract readonly class BAbstractClass
{
}
class BClass
{
}
enum BEnum
{
}
interface BInterface
{
}
abstract readonly class CAbstractClass
{
}
enum CEnum
{
}
interface CInterface
{
}
trait CTrait
{
}
final class ExampleTest
{
}

?>
