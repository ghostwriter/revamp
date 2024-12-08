<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Nikic\PhpParser\PhpParserRector;
use Ghostwriter\Revamp\Package\Nikic\PhpParser\PhpParserSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([PhpParserRector::class])
    // ->withSetProviders(PhpParserSetProvider::class)
;
