<?php

namespace App\Http\Requests;

use App\Rules\PasswordConfirmedIf;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'alpha_num'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::id())],
            'password' => ['required', new PasswordConfirmedIf($this)],
            'password_confirmation' => [
                Rule::requiredIf(
                    (function () {
                        return $this->routeIs('do.register');
                    })
                )
            ]
        ];
    }
}
