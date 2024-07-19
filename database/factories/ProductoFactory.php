<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{   
    /*
    $table->string('nombre');
    $table->decimal('precio');
    $table->decimal('precio_venta');

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $precio = fake()->numberBetween(5, 500);
        return [
            'nombre' =>fake()->sentence(2),
            'precio'=> $precio,
            'precio_venta'=>$precio * 1.30,
            'categoria_id'=>fake()->numberBetween(1,20),
            
            /*
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'remember token' => Str::random(10),
            */
        ];
    }
}
