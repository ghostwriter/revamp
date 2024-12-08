<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Package\Ghostwriter\Filesystem\FilesystemRector;
use Ghostwriter\Revamp\Package\Ghostwriter\Filesystem\FilesystemSetProvider;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([FilesystemRector::class])
    // ->withSetProviders(FilesystemSetProvider::class)
;
