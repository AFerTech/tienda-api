<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()->symbols()->numbers()
            ]
        ];
    }
    public function messages(){
        return [
            'name' => 'El Nombre es Obligatorio',
            'email.required' => 'El Email es Obligatorio',
            'email.email' => 'El Email no es valido',
            'email.unique' => 'El Email ya esta registrado',
            'password.required' => 'El Password es Obligatorio',
            'password' => 'El password debe contener al menos 8 caracteres, un simbolo y un número'
        ];
    }
}
