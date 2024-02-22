<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterAuthRequest extends FormRequest
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
            "name" => "required",
            "email" => ["required","email",Rule::unique(User::class,"email")],
            "password" => ["required","confirmed"],
            "password_confirmation" => "required",
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            "name.required" => "El campo Nombre es requerido",
            "email.required" => "El campo Correo Electronico es requerido",
            "email.unique" => "El Correo Electronico ya existe",
            "password.required" => "El campo Contraseña es requerdo",
            "password.confirmed" => "Las contraseñas no coinciden",
            "password_confirmation.required" => "El campo Repetir Contraseña es requerdo",
        ];
    }
}
