<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
                'name' => ['required', 'string','min:5', 'max:150'],
                'email' => ['required', 'string', 'email:rfc,dns', 'max:150', 'unique:users'],
                'password' => ['required', 'string', 'min:4','max:80', 'confirmed'],
        ];
    }
}
