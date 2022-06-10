<?php

namespace Idez\NovaPercentField;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class Percent extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-percent-field';

    public bool $storedInDecimal = true;
    public int $precision = 2;
    public string $base = '100';
    public bool $displayPercentSign = true;

    public function __construct(
        string $name,
        string $attribute = null,
        $resolveCallback = null
    ) {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->resolveUsing(function ($value) {
            if ($this->displayPercentSign) {
                $this->withMeta([
                    'displayPercentSign' => $this->displayPercentSign,
                ]);
            }

            if ($this->storedInDecimal) {
                return bcmul((string) $value, $this->base, $this->precision);
            }

            return $value;
        })->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
            $value = $request[$requestAttribute];

            if ($this->storedInDecimal) {
                $value = bcdiv($value, $this->base, strlen($value));
            }

            $model->{$attribute} = $value;
        });
    }

    public function precision(int $value): Percent
    {
        $this->precision = $value;

        return $this;
    }

    public function base(string $value): Percent
    {
        $this->base = $value;

        return $this;
    }

    public function storedInDecimal(bool $value = true): Percent
    {
        $this->storedInDecimal = $value;

        return $this;
    }

    public function displayPercentSign(bool $value = true): Percent
    {
        $this->displayPercentSign = $value;

        return $this;
    }
}
