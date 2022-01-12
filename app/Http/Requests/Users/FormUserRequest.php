<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
                'name' => ['string','min:5', 'max:150'],
                'email' => [ 'string', 'email:rfc,dns', 'max:150', Rule::unique('users')->ignore('email')],
                'password' => ['string', 'min:4','max:80', 'confirmed'],
        ];
    }
}
