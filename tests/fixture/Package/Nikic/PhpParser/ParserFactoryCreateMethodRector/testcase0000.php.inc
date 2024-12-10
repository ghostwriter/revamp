<?php

declare(strict_types=1);

namespace Vendor\Package;

use PhpParser\ParserFactory;

$factory = new ParserFactory;

$parser = $factory->create(ParserFactory::ONLY_PHP5);

?>
-----
<?php

declare(strict_types=1);

namespace Vendor\Package;

use PhpParser\ParserFactory;

$factory = new ParserFactory;

$parser = $factory->createForVersion(\PhpParser\PhpVersion::fromString('5.6'));

?>
