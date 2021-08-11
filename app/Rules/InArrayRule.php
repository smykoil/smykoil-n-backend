<?php

declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class InArrayRule implements Rule
{
    private array $array;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return in_array($value, $this->array);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        $availableValues = implode(separator: ', ', array: $this->array);
        return 'The value of the ":attribute" attribute is not one of the following: '.$availableValues.'.';
    }
}
