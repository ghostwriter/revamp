# Revamp

[![Automation](https://github.com/ghostwriter/revamp/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/revamp/actions/workflows/automation.yml)
[![Supported PHP Version](https://badgen.net/packagist/php/ghostwriter/revamp?color=8892bf)](https://www.php.net/supported-versions)
[![GitHub Sponsors](https://img.shields.io/github/sponsors/ghostwriter?label=Sponsor+@ghostwriter/revamp&logo=GitHub+Sponsors)](https://github.com/sponsors/ghostwriter)
[![Code Coverage](https://codecov.io/gh/ghostwriter/revamp/branch/main/graph/badge.svg)](https://codecov.io/gh/ghostwriter/revamp)
[![Type Coverage](https://shepherd.dev/github/ghostwriter/revamp/coverage.svg)](https://shepherd.dev/github/ghostwriter/revamp)
[![Psalm Level](https://shepherd.dev/github/ghostwriter/revamp/level.svg)](https://psalm.dev/docs/running_psalm/error_levels)
[![Latest Version on Packagist](https://badgen.net/packagist/v/ghostwriter/revamp)](https://packagist.org/packages/ghostwriter/revamp)
[![Downloads](https://badgen.net/packagist/dt/ghostwriter/revamp?color=blue)](https://packagist.org/packages/ghostwriter/revamp)

This package makes upgrading PHP frameworks, libraries, and tools easier.

When you update a package with Composer, the matching upgrade rules are automatically applied that Revamp will provide.

This ensures your code is updated to work with the latest package version.

No manual setup needed, just upgrade and let Revamp handle the rest!

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

- `Ghostwriter\Revamp\Rule\Vendor\Package\PackageRector`
- `Ghostwriter\Revamp\SetProvider\Vendor\Package\PackageSetProvider`

```php
<?php

declare(strict_types=1);

use Ghostwriter\Revamp\SetProvider;
use Ghostwriter\Revamp\Vendor\Package\PackageSetProvider;
use Rector\Config\RectorConfig;

// once accepted; https://github.com/rectorphp/rector-src/pull/6515

return RectorConfig::configure()->withSetProviders(SetProvider::class);
```

### Credits

- [Nathanael Esayeas](https://github.com/ghostwriter)
- [Nikita Popov `nikic/php-parser`](https://github.com/nikic/php-parser)
- [Rector - Maintainers & Contributors](https://github.com/rectorphp/rector/contributors)
- [All Contributors](https://github.com/ghostwriter/revamp/contributors)

### Changelog

Please see [CHANGELOG.md](./CHANGELOG.md) for more information on what has changed recently.

### License

Please see [LICENSE](./LICENSE) for more information on the license that applies to this project.

### Security

Please see [SECURITY.md](./SECURITY.md) for more information on security disclosure process.
