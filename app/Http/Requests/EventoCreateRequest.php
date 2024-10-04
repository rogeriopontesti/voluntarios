<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class EventoCreateRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'titulo' => 'required|unique:eventos|max:100',
            'slug' => 'required|unique:eventos|max:255',
            'evento' => 'required',
            'data' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'local' => 'required',
        ];
    }

    public function messages(): array {
        return [
            'titulo.required' => '* O campo título não foi informado!',
            'titulo.unique' => '* O <strong>título</strong> informado já existe!',
            'titulo.max' => 'O campo <strong>título</strong> possui mais de 100 caracteres!',
        ];
    }

    protected function prepareForValidation(): void {
        $this->merge([
            'slug' => Str::slug($this->titulo),
        ]);
    }
}
