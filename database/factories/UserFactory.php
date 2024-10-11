<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
//        $password = Str::random(10);
        $password = 123;
        //'SEGUIDOR', 'FIGURA_PUBLICA', 'INFLUENCIADOR', 'CANDIDATO'
        $perfis = ['SEGUIDOR', 'FIGURA_PUBLICA', 'INFLUENCIADOR', 'CANDIDATO'];
        $tipos = ['FILIADO', 'ADMINISTRADOR'];
        return [
            'id' => fake()->uuid,
            'nome' => fake()->name,
            'nome_social' => fake()->firstName,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make($password),
            'remember_token' => $password,
//            'cidade' => fake()->city,
//            'estado' => fake()->countryCode,
            'telefone' => fake()->phoneNumber,
            'area_de_atuacao' => fake()->paragraph(3),
            'perfil' => $perfis[array_rand($perfis)],
            'tipo_de_usuario' => $tipos[array_rand($tipos)],
            'foto' => fake()->imageUrl(80, 80),
        ];
    }
    

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
