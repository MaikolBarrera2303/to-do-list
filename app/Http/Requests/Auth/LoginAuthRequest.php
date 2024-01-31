<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "email" => "required|email",
            "password" => "required",
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            "email.required" => "El campo Correo Electronico es requerido",
            "email.email" => "El campo Correo Electronico no tiene el formato adecuado",
            "password.required" => "El campo Contrasela es requerido",
        ];
    }
}
