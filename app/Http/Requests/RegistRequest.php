<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:App\Models\Users,email',
            'password' => 'required|min:7',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
          'email' => [
              'required' => 'Email является обязательным.',
              'email' => 'Email некорректный.',
              'unique' => 'Такой email уже зарегистрирован. Войдите в аккаунт.'
          ],
          'password' => [
              'required' => 'Пароль является обязательным.',
              'min' => 'Пароль должен содержать не менее 7 символов.'
          ],
          'confirm_password' => [
              'required' => 'Повторить пароль является обязательным.',
              'same' => 'Пароли не совпадают.'
          ]
        ];
    }
}
