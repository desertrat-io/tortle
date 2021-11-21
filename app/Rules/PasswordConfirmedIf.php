<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordConfirmedIf implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(private FormRequest $request)
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // as of writing, this only applies on the registration page
        // however we want this request to be reusable across the board since
        // it's for anything account related
        if ($this->request->route()->named('do.register')) {
            return $value === $this->request->input($attribute . '_confirmation');
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.password_confirmed_if');
    }
}
