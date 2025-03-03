<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Futbolista>
 */
class FutbolistaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name, // Puedes usar un nombre aleatorio
            'fecha_nac' => $this->faker->date, // Genera una fecha aleatoria
            'edad' => $this->faker->numberBetween(18, 100), // Edad aleatoria entre 18 y 100
            'nacionalidad' => $this->faker->country, // Nacionalidad aleatoria
            'imagen' => $this->faker->imageUrl, // URL de imagen aleatoria
            'id_usuario' => \App\Models\User::factory(), // Relaciona con un usuario generado por el factory de usuarios
        ];
    }
}
