<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        $titulo = "";
        return [
            'id' => fake()->uuid,
            'user_id' => User::pluck('id')->random(),
            'titulo' => $titulo = fake()->name,
            'slug' => Str::slug($titulo),
            'evento' => fake()->realText,
            'data' => fake()->date,
            'hora' => fake()->time,
            'local' => fake()->address,
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
            'foto' => fake()->imageUrl(800, 800),
        ];
    }
}
