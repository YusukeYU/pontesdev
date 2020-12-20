<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class EditServiceRequest extends FormRequest
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
            'price' => 'required|max:8',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Informe um nome válido!',
            'price.required' => 'Informe um valor válido!',
            'price.max' => 'Informe um valor menor!',
            'description.required' => 'Informe uma descrição válida!'
           
        ];
    }
}
