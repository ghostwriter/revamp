# Revamp

[![Automation](https://github.com/ghostwriter/revamp/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/revamp/actions/workflows/automation.yml)
[![Supported PHP Version](https://badgen.net/packagist/php/ghostwriter/revamp?color=8892bf)](https://www.php.net/supported-versions)
[![GitHub Sponsors](https://img.shields.io/github/sponsors/ghostwriter?label=Sponsor+@ghostwriter/revamp&logo=GitHub+Sponsors)](https://github.com/sponsors/ghostwriter)
[![Code Coverage](https://codecov.io/gh/ghostwriter/revamp/branch/main/graph/badge.svg)](https://codecov.io/gh/ghostwriter/revamp)
[![Latest Version on Packagist](https://badgen.net/packagist/v/ghostwriter/revamp)](https://packagist.org/packages/ghostwriter/revamp)
[![Downloads](https://badgen.net/packagist/dt/ghostwriter/revamp?color=blue)](https://packagist.org/packages/ghostwriter/revamp)

> [!NOTE]
>
> Star ⭐ this repo if you find it useful.
>

This package makes upgrading PHP frameworks, libraries, and tools easier.

When you update a package with Composer, the matching upgrade rules are automatically applied that Revamp will provide.

This ensures your code is updated to work with the latest package version.

Run `composer update` then `rector process`

**Revamp** handle the rest!

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

Add `\Ghostwriter\Revamp\Rector::REVAMP` set to your `rector.php` config file:

```php
declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()->withSets([\Ghostwriter\Revamp\Rector::REVAMP]);
```

## Features

- [ ] PHPUnit
    - [x] Add `@throws \Throwable` Annotation to Test Methods
    - [ ] Upgrade PHPUnit to 9.x
    - [ ] Upgrade PHPUnit to 10.x
    - [ ] Upgrade PHPUnit to 11.x

- [x] PHP-Parser
    - [ ] Upgrade PHP-Parser to 5.x
      - [x] Parser Factory create method

- [ ] Psalm
    - [ ] Upgrade Psalm to 5.x
    - [ ] Upgrade Psalm to 6.x

- [ ] Mockery
  - [ ] Hamcrest To PHPUnit
  - [ ] PHPUnit To Mockery
  - [ ] Prophecy To Mockery
  - [x] Upgrade Mockery to 1.x
    - [x] Extend Mockery TestCase
    - [x] Use Mockery PHPUnit Integration Trait
  - [ ] Upgrade Mockery to 2.x
    - [ ] Should Receive To Allows
    - [ ] Should Receive To Expects

- [ ] PHP
    - [x] Replace unnecessary double quotes with single quotes
    - [x] Sort `use` statements alphabetically
    - [x] Sort `ClassLike` statements alphabetically
    - [ ] Upgrade PHP to 8.0
    - [ ] Upgrade PHP to 8.1
    - [ ] Upgrade PHP to 8.2
    - [ ] Upgrade PHP to 8.3
    - [ ] Upgrade PHP to 8.4
    - [ ] Upgrade PHP to 8.5

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
