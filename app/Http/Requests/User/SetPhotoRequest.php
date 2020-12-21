<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SetPhotoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'img' => 'required|image|',
        ];
    }
    public function messages()
    {
        return [
            'img.required' => 'Necessário anexar uma imagem!',
            'img.image' => 'O Arquivo anexado não é uma imagem!',
        ];
    }
}
