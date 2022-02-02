<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'termos' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];

    }

    public function messages()
    {
        return [
            'first_name.required' => 'Nome é obrigatório.',
            'last_name.required' => 'Sobrenome é obrigatório.',
            'email.required' => 'Email é obrigatório.',
            'password.required' => 'Senha é obrigatório.',
            'confirm_password.required' => 'Confirmar senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'termos.required' => 'Aceitar os termos é obrigatório.',
            'confirm_password.same' => 'Os campos confirmar senha e senha devem corresponder.',
            'email.unique' => 'Email já cadastrado.'
        ];
    }



}
