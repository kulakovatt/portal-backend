<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToursRequest extends FormRequest
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
            'name' => 'required|string',
            'planet' => 'required|string',
            'description' => 'required|string',
            'duration' => 'required|string',
            'residence' => 'required|string',
            'count_passengers' => 'required|integer',
            'price' => 'required|numeric',
            'date_flight' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'name' => [
                'required' => 'Введите название тура.',
            ],
            'planet' => [
                'required' => 'Введите название планеты.',
            ],
            'description' => [
                'required' => 'Введите описание тура.',
            ],
            'duration' => [
                'required' => 'Введите длительность полета.',
            ],
            'residence' => [
                'required' => 'Введите промежуток пребывания на объекте.',
            ],
            'count_passangers' => [
                'required' => 'Введите кол-во пассажиров на борту.',
                'integer' => 'Кол-во пассажиров должно быть целым числом.'
            ],
            'price' => [
                'required' => 'Введите цену тура.',
                'required' => 'Цена должна быть числом.',
            ],
            'date_flight' => [
                'required' => 'Выберите дату полета.',
                'required' => 'Неправильный формат даты.',
            ]

        ];
    }
}
