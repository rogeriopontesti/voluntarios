<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email" => "required|email|max:100",
            "password" => "required|max:100",
        ];
    }
    
    public function messages(): array {
        return [
            "email.required" => __("* Por favor, informe o seu e-mail!"),
            "email.email" => __("* O email informado é inválido!"),
            "email.max" => __("* O email informado possui mais de 100 caracteres!"),
            "password.required" => __("* Por favor, informe a sua senha de acesso!"),
            "password.max" => __("* A senha informada possui mais de 100 caracteres!"),
        ];
    }
}
