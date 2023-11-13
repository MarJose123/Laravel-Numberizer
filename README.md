# Laravel package to create autonumber for Eloquent model

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marjose123/laravel-numberizer.svg?style=flat-square)](https://packagist.org/packages/marjose123/laravel-numberizer)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/marjose123/laravel-numberizer/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/marjose123/laravel-numberizer/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/marjose123/laravel-numberizer/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/marjose123/laravel-numberizer/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/marjose123/laravel-numberizer.svg?style=flat-square)](https://packagist.org/packages/marjose123/laravel-numberizer)


## Installation

You can install the package via composer:

```bash
composer require marjose123/laravel-numberizer
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-numberizer-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-numberizer-config"
```

This is the contents of the published config file:

```php
return [
 /*
    * '?' will be replaced with the increment number.
    */
    'placeholder' => '?',
    /*
     * The number of digits in the autonumber
     */
    'length' => (int) 6,
    /*
     *   The Starting Value you want to start the creation of the incremental number
     */
    'startingValue' => (int) 11111
];
```


## Usage

1. Add the `AutoNumber` contracts and add also to your model the `HasNumberizer` concerns.

```php
use  \MarJose123\LaravelNumberizer\Contracts\AutoNumber;
use \MarJose123\LaravelNumberizer\Concerns\HasNumberizer;

class Purchase extends Model implements AutoNumber
{
    use HasNumberizer;
    
    /**
     * Return the autonumber configuration array for this model.
     *
     * @return array
     */
    public function numberizerOptions()
    {
        return [
            'purchase_number' => [
                'format' => 'PO-?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 5 // The number of digits in an autonumber
            ]
        ];
    }

}
```

2. If you want to use `closure` on your format you do so.
```php
public function getAutoNumberOptions()
{
    return [
        'purchase_number' => [
            'format' => function () {
                return 'PO-' . \Carbon\Carbon::today()->year . '-?'; // autonumber format. '?' will be replaced with the generated number.
            },
            'length' => 6 // The number of digits in the autonumber
        ]
    ];
}

```

The `purchase_number` will be automatically generated based on the format given when saving the Purchase model.


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [MarJose](https://github.com/MarJose123)
- [alfa6661](https://github.com/alfa6661)
- [All Contributors](../../contributors)

## Thank you!

- [laravel-autonumber](https://github.com/alfa6661/laravel-autonumber) - For beautiful plugin.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
