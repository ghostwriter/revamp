<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Shell\ShellRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Shell\ShellSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([ShellRector::class])
    // ->withSetProviders(ShellSetProvider::class)
;
