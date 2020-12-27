<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class EditTaskRequest extends FormRequest
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
            'name' => 'required|',
            'description' => 'required|',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Informe um nome válido!',
            'description.required' => 'Informe uma descrição válida!'
           
        ];
    }
}
