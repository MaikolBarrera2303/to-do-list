<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordUserRequest extends FormRequest
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
            "current_password" => "current_password",
            "password" => ["Confirmed","required"]
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            "current_password.current_password" => "La contraseña actual esta incorrecta",
            "password.confirmed" => "Las contraseñas no coinciden"
        ];
    }
}
