<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
            'nombre' => 'required|regex:/^[\pL\_\s\-]+$/u',
            'apellido_paterno' => 'required|alpha_dash',
            'apellido_materno' => 'required|alpha_dash',
            'correo' => 'required|email',
            'contrato' => 'required',
        ];
    }
}
