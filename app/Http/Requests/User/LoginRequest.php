<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email_user' => 'required|email',
            'password_user' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email_user.required' => 'Informe um e-mail válido',
            'email_user.email' => 'Informe um e-mail válido',
            'password_user.required' => 'Informe uma senha válida'
        ];
    }
}
