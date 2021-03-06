<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
          'nombre' => 'required|string|max:255|regex:/^[a-zñA-ZÑáéíóúÁÉÍÓÚ\s]+$/',
          'apellido' => 'required|string|max:255|regex:/^[a-zñA-ZÑáéíóúÁÉÍÓÚ\s]+$/',
          'telefono' => 'required|string|max:255|regex:/^[0-9]+$/',
          'apartamento' => 'string|max:255|regex:/^[0-9]+$/',
          'email' => 'required|regex:/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',
      ];
    }
    public function messages()
    {
        return [
          'required' => 'El campo es obligatorio.',
          'nombre.regex' =>'Puede utilizar solo letras y espacios.',
          'apellido.regex' =>'Puede utilizar solo letras y espacios.',
          'telefono.regex' =>'Solo acepta numeros.',
          'email.regex' => 'Ingrese una direccion de correo valida.',
          'apartamento.regex' => 'Solo se aceptan numeros enteros.',
        ];
    }
}
