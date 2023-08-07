<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254','unique:users'],
            'password' => ['required'],

        ];
    }

    public function authorize()
    {
        return true;
    }
}
