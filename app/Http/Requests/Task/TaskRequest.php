<?php

namespace App\Http\Requests\Task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            "title" => "required",
            "description" => "required",
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            "title.required" => "El campo titulo es requerido",
            "description.required" => "El campo descripcion es requerido",
        ];
    }
}
