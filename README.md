# Nova Percent Field

[![License](https://poser.pugx.org/idez/nova-percent-field/license)](https://packagist.org/packages/idez/nova-percent-field)
[![Latest Stable Version](https://poser.pugx.org/idez/nova-percent-field/v/stable)](https://packagist.org/packages/idez/nova-percent-field)
[![Total Downloads](https://poser.pugx.org/idez/nova-percent-field/downloads)](https://packagist.org/packages/idez/nova-percent-field)

## About

This is a Laravel Nova 4 custom field for percent values.

## Requirements

-   `php: ^7.4|^8.0|^8.1`

## Installation

To install the custom field run the following command in your Laravel Nova project:

```bash
composer require idez/nova-percent-field
```

## Usage

Simply add this field in your Nova resource.

```php
use Idez\NovaPercentField\Percent;
use Laravel\Nova\Http\Requests\NovaRequest;

class CustomResource extends Resource
{
    public function fields(NovaRequest $request): array
    {
        return [
            Percent::make('Label', 'field'),
        ];
    }
}
```

## Contributing

Contributions are welcome, explain the issue/feature that you want to solve/add and back your code up with tests. Happy coding!

## License

This package was originally developed by https://github.com/NikolaySav/nova-percent-field however they have abandoned the package.
The MIT License (MIT). Please see [License File](LICENSE) for more information.
