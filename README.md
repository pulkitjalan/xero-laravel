# :warning: Archived
### This project is no longer maintained.

Xero Laravel
=============
> A Laravel wrapper for Xero

[![Total Downloads](https://img.shields.io/packagist/dt/pulkitjalan/xero-laravel.svg?style=flat-square)](https://packagist.org/packages/pulkitjalan/xero-laravel)

## Requirements

* PHP >= 7.2
* php_curl extension - ensure a recent version (7.30+)
* php_openssl extension

This package wraps [calcinai/xero-php](https://github.com/calcinai/xero-php) package.

## Installation

Require the package

```sh
composer require pulkitjalan/xero-laravel
```

Laravel 5.5 uses Package Auto-Discovery, so you don't need to manually add the ServiceProvider.

If you don't use auto-discovery, add the following to the `providers` array in your `config/app.php`

```php
PulkitJalan\Xero\XeroServiceProvider::class,
```

Next add the following to the `aliases` array in your `config/app.php`. Pick and choose if you want or add all 3.

```php
'XeroPrivate' => PulkitJalan\Xero\Facades\XeroPrivate::class,
'XeroPublic' => PulkitJalan\Xero\Facades\XeroPublic::class,
'XeroPartner' => PulkitJalan\Xero\Facades\XeroPartner::class,
```

Next run `php artisan vendor:publish --provider="PulkitJalan\Xero\XeroServiceProvider"` to publish the config file.

## Usage

Since this package wraps [calcinai/xero-php](https://github.com/calcinai/xero-php), have a look at the [readme](https://github.com/calcinai/xero-php) there for further details.

Example:

```php
use XeroPHP\Application\PrivateApplication

class App {
    protected $xero;

    public function __construct(PrivateApplication $xero) {
        $this->xero = $xero;
    }
}
```

or

```php
use XeroPHP\Application\PrivateApplication

$xero = app(PrivateApplication::class);

// or

$xero = app('XeroPrivate');
```

or use the facades.

## Similar Packages

* [drawmyattention/xerolaravel](https://github.com/amochohan/xerolaravel)
