<?php

namespace App\Http\Requests\User;;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email_user',
            'admin' => 'required',
            'password' => 'required|min:12',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Informe um nome válido!',
            'email.required' => 'Informe um e-mail válido!',
            'email.email' => 'Informe um e-mail válido!',
            'email.unique' => 'E-mail já cadastrado!',
            'admin.required' => 'Informe a permissão de admin!',
            'password.required' => 'Informe uma senha válida!',
            'password.min' => 'Informe uma senha com no mínimo 12 dígitos!',
        ];
    }
}
