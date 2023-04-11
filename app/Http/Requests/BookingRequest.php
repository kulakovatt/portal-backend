<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'country' => 'required',
            'city' => 'required',
            'id_tour' => 'required',
            'experience' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'country.required' => 'Введите страну',
            'city.required' => 'Введите город',
            'id_tour.required' => 'Выберите тур',
            'experience.required' => 'Расскажите о вашем опыте'
        ];
    }
}
