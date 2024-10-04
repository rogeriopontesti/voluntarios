<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {

        return [
            "id" => fake()->uuid(),
            "user_id" => User::pluck('id')->random(),
            "cep" => fake()->numerify("#####-###"),
            "logradouro" => fake()->address(),
            "complemento" => fake()->sentence,
            "bairro" => fake()->sentence,
            "cidade" => fake()->city,
            "estado" => fake()->countryCode,
            "endereco_tipo" => (string) array_rand(["Endereço residencial", "Endereço comercial/profissional", "Endereço de correspondência", "Endereço de entrega", "Endereço de cobrança", "Endereço fiscal", "Endereço de contato", "Endereço de férias", "Endereço alternativo"], 1),
        ];
    }
}
