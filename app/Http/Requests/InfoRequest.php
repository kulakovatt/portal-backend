<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'gender' => 'required',
            'birthday' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'firstname' => [
                'required' => 'Имя является обязательным.',
                'alpha' => 'Имя должно состоять из буквенных символов.'
            ],
            'lastname' => [
                'required' => 'Фамилия является обязательной.',
                'alpha' => 'Фамилия должна состоять из буквенных символов.'
            ],
            'gender' => [
                'required' => 'Выбор пола является обязательным..'
            ],
            'birthday' => [
                'required' => 'Дата рождения является обязательной.'
            ],
        ];
    }
}
