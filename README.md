### linode client
[![Latest Version on Packagist](https://img.shields.io/packagist/v/samuelmwangiw/linode.svg?style=flat-square)](https://packagist.org/packages/samuelmwangiw/linode)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/samuelmwangiw/linode/run-tests.yml?branch=main&label=tests)](https://github.com/samuelmwangiw/linode/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/samuelmwangiw/linode/php-cs-fixer.yml?branch=main&label=code%20style)](https://github.com/samuelmwangiw/linode/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![PHPStan](https://github.com/SamuelMwangiW/linode/actions/workflows/phpstan.yml/badge.svg)](https://github.com/SamuelMwangiW/linode/actions/workflows/phpstan.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/samuelmwangiw/linode.svg?style=flat-square)](https://packagist.org/packages/samuelmwangiw/linode)

---
A Simple Linode client built for Laravel.

---

## Installation

You can install the package via composer:

```bash
composer require samuelmwangiw/linode
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="SamuelMwangiW\Linode\LinodeServiceProvider" --tag="linode-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="SamuelMwangiW\Linode\LinodeServiceProvider" --tag="linode-config"
```

This is the contents of the published config file:

```php
return [
    'endpoint' => env('LINODE_API_ENDPOINT', 'https://api.linode.com/v4/'),
    'token' => env('LINODE_PERSONAL_ACCESS_TOKEN'),
];
```

## Usage

@todo.

```php
use SamuelMwangiW\Linode\Facades\Linode;

// Get your account details
Linode::account();

// List created Firewalls
Linode::firewall()->list();

// Get a Firewall rule
Linode::firewall()->show(123456);

// Delete a Firewall and its rules
Linode::firewall()->destroy(123456);

// Get all rules attached to a Firewall
Linode::firewall()->rules()->show(123456);

// Get available images
Linode::images()->list();

$image = [
    'disk_id' => 67890123,
    'label' => 'backup_disk',
    'description' => 'Created in tests, delete',
];

// Create image from disk
Linode::images()->create($disk);

// show an image
Linode::images()->show(12345678);

// Delete a user created image
Linode::images()->destroy(12345678);

// List of available instances
Linode::instance()->list();

// Get an instance details
Linode::instance()->show(654321);

// Get list of disks attached to an instance
Linode::instance()->disks(654321);

$instance = [
    'authorized_keys' => ['ssh-rsa yourverysecuresshpublickeywhoseprivatekeywillneverbeleakedontheinternetandfileperssionsarepermanentlysetto0600='],
    'authorized_users' => ['unicorn'],
    'region' => 'eu-west',
    'image' => 'linode/ubuntu22.04',
    'private_ip' => true,
    'label' => 'unicorn-worker-42',
    'root_pass' => fake()->password(),
    'type' => 'g6-nanode-1',
    'watchdog_enabled' => true,
    'tags' => ['workers', 'to-the-moon'],
];

// Create a linode instance
Linode::instance()->create($instance);

// Update an instance details
Linode::instance()
       ->update(654321, ['label'=> 'mars-rover','tags'=>['mars-colony']]);

// Clone a Linode instance
Linode::instance()
       ->clone(654321,['label'=>'mars-rover-02','tags'=>['test']]);

// Nuke 💣 an instance
Linode::instance()->destroy(654321);

// Shutdown an instance
Linode::instance()->shutdown(654321);

// List available Linode plans
Linode::billing()->plans();

// List of available regions
Linode::region()->list();
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
