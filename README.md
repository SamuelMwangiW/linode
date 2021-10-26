### linode-cli
[![Latest Version on Packagist](https://img.shields.io/packagist/v/samuelmwangiw/linode-cli.svg?style=flat-square)](https://packagist.org/packages/samuelmwangiw/linode-cli)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/samuelmwangiw/linode-cli/run-tests?label=tests)](https://github.com/samuelmwangiw/linode-cli/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/samuelmwangiw/linode-cli/Check%20&%20fix%20styling?label=code%20style)](https://github.com/samuelmwangiw/linode-cli/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/samuelmwangiw/linode-cli.svg?style=flat-square)](https://packagist.org/packages/samuelmwangiw/linode-cli)

---
A Simple Linode cli built for Laravel with @JustSteveKing laravel-transporter package

---

## Installation

You can install the package via composer:

```bash
composer require samuelmwangiw/linode-cli
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="SamuelMwangiW\LinodeCli\LinodeCliServiceProvider" --tag="linode-cli-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="SamuelMwangiW\LinodeCli\LinodeCliServiceProvider" --tag="linode-cli-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Samuel Mwangi](https://github.com/SamuelMwangiW)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
