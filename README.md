# This is my package MonkCms

[![Latest Version on Packagist](https://img.shields.io/packagist/v/monkdev/monkcms-laravel.svg?style=flat-square)](https://packagist.org/packages/monkdev/monkcms-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/monkdev/monkcms-laravel/run-tests?label=tests)](https://github.com/skylerkatz/monkcms-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/skylerkatz/monkcms-laravel/Check%20&%20fix%20styling?label=code%20style)](https://github.com/monkdev/monkcms-laravel/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/monkdev/monkcms-laravel.svg?style=flat-square)](https://packagist.org/packages/monkdev/monkcms-laravel)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.


## Installation

You can install the package via composer:

```bash
composer require monkdev/monkcms-laravel
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Monkdev\MonkCms\MonkCmsServiceProvider" --tag="monkcms-laravel-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Monkdev\MonkCms\MonkCmsServiceProvider" --tag="monkcms-laravel-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$monkcms-laravel = new Monkdev\MonkCms();
echo $monkcms-laravel->echoPhrase('Hello, Spatie!');
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

- [Skyler Katz](https://github.com/skylerkatz)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
