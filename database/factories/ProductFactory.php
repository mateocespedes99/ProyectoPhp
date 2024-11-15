<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    // Define explícitamente el modelo asociado con esta fábrica
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(1),
            'price' => $this->faker->randomFloat($maxDecimals = 2, $min = 3, $max = 100),
            'stock' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['available', 'unavaliable']),
        ];
    }
}


//con esto se crea una instacia de products \App\Models\Product::factory()->make(); pero no se guarda en base de datos, para guardar en base de datos usar create
