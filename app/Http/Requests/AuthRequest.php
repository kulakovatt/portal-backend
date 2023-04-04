<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email:rfc,dns|exists:App\Models\Users,email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email' => [
                'required' => 'Email является обязательным.',
                'email' => 'Email некорректный.',
                'exists' => 'Такой email не зарегистрирован.',
            ],
            'password' => [
                'required' => 'Пароль является обязательным.',
            ]
        ];
    }
}
