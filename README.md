# Revamp

[![Automation](https://github.com/ghostwriter/revamp/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/revamp/actions/workflows/automation.yml)
[![Supported PHP Version](https://badgen.net/packagist/php/ghostwriter/revamp?color=8892bf)](https://www.php.net/supported-versions)
[![GitHub Sponsors](https://img.shields.io/github/sponsors/ghostwriter?label=Sponsor+@ghostwriter/revamp&logo=GitHub+Sponsors)](https://github.com/sponsors/ghostwriter)
[![Code Coverage](https://codecov.io/gh/ghostwriter/revamp/branch/main/graph/badge.svg)](https://codecov.io/gh/ghostwriter/revamp)
[![Type Coverage](https://shepherd.dev/github/ghostwriter/revamp/coverage.svg)](https://shepherd.dev/github/ghostwriter/revamp)
[![Psalm Level](https://shepherd.dev/github/ghostwriter/revamp/level.svg)](https://psalm.dev/docs/running_psalm/error_levels)
[![Latest Version on Packagist](https://badgen.net/packagist/v/ghostwriter/revamp)](https://packagist.org/packages/ghostwriter/revamp)
[![Downloads](https://badgen.net/packagist/dt/ghostwriter/revamp?color=blue)](https://packagist.org/packages/ghostwriter/revamp)

Rector upgrade rules for PHP frameworks, libraries, and tools.

> [!NOTE]
>
> Star ⭐ this repo if you find it useful.
>

> [!WARNING]
>
> This project is not finished yet, work in progress.
> 

## Installation

You can install the package via composer:

``` bash
composer require rector/rector --dev
composer require ghostwriter/revamp --dev
```

## Usage

To add a rule or set to your config, with package version constants:

- `Ghostwriter\Revamp\Rule\Vendor\Package\Rector`
- `Ghostwriter\Revamp\SetList\Vendor\Package\SetList`

```php
<?php

declare(strict_types=1);

use Ghostwriter\Revamp\Rule\Vendor\Package\LaminasRector;
use Ghostwriter\Revamp\Rule\Vendor\Package\MezzioRector;
use Ghostwriter\Revamp\Rule\Vendor\Package\MockeryRector;
use Ghostwriter\Revamp\Rule\Vendor\Package\PHPUnitRector;
use Ghostwriter\Revamp\Rule\Vendor\Package\PsalmRector;
use Ghostwriter\Revamp\Rule\Vendor\Package\PsrRector;
use Ghostwriter\Revamp\Rule\Vendor\Package\RectorRector;
use Ghostwriter\Revamp\SetList\Vendor\Package\MezzioSetList;
use Ghostwriter\Revamp\SetList\Vendor\Package\MockerySetList;
use Ghostwriter\Revamp\SetList\Vendor\Package\PHPUnitSetList;
use Ghostwriter\Revamp\SetList\Vendor\Package\PsalmSetList;
use Ghostwriter\Revamp\SetList\Vendor\Package\PsrSetList;
use Ghostwriter\Revamp\SetList\Vendor\Package\SetList;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRules([
        LaminasRector::class,
        MezzioRector::class,
        MockeryRector::class,
        PHPUnitRector::class,
        PsalmRector::class,
        PsrRector::class,
        RectorRector::class,
    ])
    ->withSets([
        /**
         * `*SetList::version(int $major, int $minor): string` method
         *
         * - To upgrade to a specific installed version of a package, use the version() method 
         *   with the major and minor version numbers.
         *
         * - To use the latest installed version, use the version() method without arguments. 
         */
        LaminasSetList::version(), // Laminas (latest)
        MezzioSetList::version(3, 20), // Mezzio 3.20
        MockerySetList::version(), // Mockery (latest)
        PHPUnitSetList::version(11, 4), // PHPUnit 11.4
        PsalmSetList::version(5, 21), // Psalm 5.21
        PsrSetList::version(), // Psr (latest)
        RectorSetList::version(), // Rector (latest)
    ]);
```

### Credits

- [Nathanael Esayeas](https://github.com/ghostwriter)
- [Rector - Maintainers & Contributors](https://github.com/rectorphp/rector/contributors)
- [All Contributors](https://github.com/ghostwriter/revamp/contributors)

### Changelog

Please see [CHANGELOG.md](./CHANGELOG.md) for more information on what has changed recently.

### License

Please see [LICENSE](./LICENSE) for more information on the license that applies to this project.

### Security

Please see [SECURITY.md](./SECURITY.md) for more information on security disclosure process.
