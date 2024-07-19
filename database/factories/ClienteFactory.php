<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /*
    $table->id('DNI');
    $table->string('Nombres');
    $table->string('Apellidos');
            $table->decimal('Limite_Credito');
            $table->string('Direccion');
            $table->string('Foto');
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'DNI'=>fake()->sentence(2),
            'Nombres'=>fake()->sentence(2),
            'Apellidos'=>fake()->sentence(2),
            'Limite_Credito'=>fake()->sentence(2),
            'Direccion'=>fake()->sentence(5),
            'Foto'=>fake()->sentence(1),
        ];
    }
}
