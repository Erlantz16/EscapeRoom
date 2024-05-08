<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Puntuaciones>
 */
class PuntuacionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "puntuacion" => $this -> faker -> randomNumber(),
            "id_usuario" => User::inRandomOrder() -> first() -> id,
        ];
    }
}
