<?php

namespace App\Http\Requests\Lead;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'phone' => 'required|min:9'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe um nome válido!',
            'name.min' => 'Informe um nome válido!',
            'email.required' => 'Informe um e-mail válido!',
            'email.email' => 'Informe um e-mail válido!',
            'phone.required' => 'Informe um telefone válido!',
            'phone.min' => 'Informe um telefone válido!',
        ];
    }
}
