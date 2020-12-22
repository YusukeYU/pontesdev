<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class EditClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:8',
            'cpf' => 'required|min:11',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório!',
            'name.min' => 'Nome informado muito curto!',
            'email.required' => 'Email é obrigatório!',
            'email.email' => 'O e-mail informado é invalido!',
            'phone.required' => 'Telefone é obrigatório!',
            'phone.min' => 'Telefone informado muito curto!',
            'cpf.required' => 'CPF é obrigatório!',
            'cpf.min' => 'CPF informado muito curto!',
        ];
    }
}
