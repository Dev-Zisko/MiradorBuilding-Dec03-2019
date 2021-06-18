<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'monto' => 'required|string|max:255',
            'prioridad' => 'required|string|max:255|regex:/^[0-9]+$/',
        ];
    }

    public function messages()
    {
        return [
          'required' => 'El campo es obligatorio.',
          'prioridad.regex' => 'Solo acepta numeros enteros.',
        ];
    }
}
