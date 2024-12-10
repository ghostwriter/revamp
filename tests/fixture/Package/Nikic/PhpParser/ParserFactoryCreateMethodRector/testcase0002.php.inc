<?php

declare(strict_types=1);

namespace Vendor\Package;

use PhpParser\ParserFactory;

$factory = new ParserFactory;

$parser = $factory->create(ParserFactory::PREFER_PHP7);

?>
-----
<?php

declare(strict_types=1);

namespace Vendor\Package;

use PhpParser\ParserFactory;

$factory = new ParserFactory;

$parser = $factory->createForNewestSupportedVersion();

?>
