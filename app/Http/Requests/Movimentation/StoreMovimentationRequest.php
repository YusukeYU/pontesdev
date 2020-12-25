<?php

namespace App\Http\Requests\Movimentation;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovimentationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'value' => 'required|max:8',
            'description' => 'required|',
        ];
    }
    public function messages()
    {
        return [
            'value.required' => 'Informe um valor válido!',
            'value.max' => 'Informe um valor menor!',
            'description.required' => 'Justifique a movimentaçãos!'
           
        ];
    }
}
