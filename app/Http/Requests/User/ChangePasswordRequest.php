<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'currentPassword' => 'required|',
            'newPassword1' => 'required|min:12',
            'newPassword2' => 'required|',
        ];
    }

    public function messages()
    {
        return [
            'currentPassword.required' => 'Insira senha atual!',
            'newPassword1.required' => 'Insira a nova senha!',
            'newPassword1.min' => 'A nova senha deve ter no mínimo 12 caracteres!',
            'newPassword2.required' => 'Repita a nova senha!'
        ];
    }
}
