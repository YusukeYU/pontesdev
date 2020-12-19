<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'admin' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'admin.required' => 'Informe a permissão de admin'
        ];
    }
}
