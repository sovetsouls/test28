<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Определение авторизации пользователя для осуществления запроса
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила проверки для запроса
     */
    public function rules(): array
    {
        return [
            'model_id' => ['required', 'exists:models,id'],
            'year'     => ['nullable', 'integer', 'min:1900', 'max:'.date('Y')],
            'mileage'  => ['nullable', 'integer', 'min:0'],
            'color'    => ['nullable', 'string', 'max:255'],
        ];
    }
}
