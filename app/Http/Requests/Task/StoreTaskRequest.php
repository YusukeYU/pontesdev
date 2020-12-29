<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|',
            'description' => 'required|',
            'date' => 'required|',
            'hour2' => 'required|',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Informe um nome válido!',
            'description.required' => 'Informe uma descrição válida!',
            'date.required' => 'Informe uma data válida!',
            'hour2.required' => 'Informe um horário válido!',
           
        ];
    }
}
