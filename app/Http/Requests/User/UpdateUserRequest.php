<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            "name"  => "required",
            "email"  => ["required","email",Rule::unique(User::class,"email")->ignore(Auth::id())],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            "name.required" => "El campo Nombre es requerido",
            "email.required" => "El campo Correo Electronico es requerido",
            "email.unique" => "El correo electronico ya existe",
        ];
    }
}
