<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class EventoRequest extends FormRequest {

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

        data: [
            'foto' => 'valor default',
        ];

        if (isset($this->id) && $this->route()->action["as"] == "eventos.update") {
            return [
                'titulo' => "required|unique:eventos,titulo,{$this->id}|max:100",
                'slug' => "required|unique:eventos,slug,{$this->id}|max:255",
                'evento' => "required|max:1000",
                'data' => "required|date",
                'hora' => "required|date_format:H:i",
                'local' => "required",
                'foto' => "nullable|image|mimes:jpeg,jpg,png,gif,{$this->id}",
            ];
        } else {
            return [
                'user_id' => 'required',
                'titulo' => 'required|unique:eventos|max:100',
                'slug' => 'required|unique:eventos|max:255',
                'evento' => 'required|max:1000',
                'data' => 'required|date',
                'hora' => 'required|date_format:H:i',
                'local' => 'required',
                'foto' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            ];
        }
    }

    public function messages(): array {
        return [
            "user_id.required" => __("* Por favor, informe o proprietário do registro!"),
            "titulo.required" => __("* Por favor, informe um título para o evento!"),
            "titulo.unique" => __("* O título informado para o evento já existe em nossos registros!"),
            'titulo.max' => __("O título informado para o evento possui mais de 100 caracteres!"),
            'slug.required' => __("Sem o título do evento, não é possível gerar uma URL amigável!"),
            'slug.unique' => __("Este título não permite gerar uma URL amigável para o evento!"),
            'evento.required' => __("Por favor, descreva o evento com no máximo 1000 caracteres!"),
            'data.required' => __("Por favor, informe uma data para o evento!"),
            'data.date' => __("A data informada para o evento é inválida!"),
            'hora.required' => __("Por favor, informe o horário do evento!"),
            'hora.date_format' => __("O horário informado para o evento é inválido!"),
            'local.required' => __("Por favor, informe o local que acontecerá o evento!"),
//            'foto.image' => __("Por favor, selecione uma foto na sua galeria!"),
//            'foto.mimes' => __("Os formatos de imagens permitido são: jpeg,jpg,png,gif!"),
        ];
    }

    protected function prepareForValidation(): void {
        $this->merge([
            'slug' => Str::slug($this->titulo),
        ]);
    }
}
