<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all(); // Obtiene todas las categorías existentes

        Product::factory()->count(20)->create()->each(function ($product) use ($categories) {
            // Asigna una categoría aleatoria a cada producto
            $product->category_id = $categories->random()->id;
            $product->save();
        });
    }
}
