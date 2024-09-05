<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory(100)->create();
        $propertyList = ['Цвет', 'ОС', 'Версия'];
        $propertyValues = [
            ['Красный', 'Синий', 'Желтый', 'Зеленый'],
            ['iOS', 'Android', 'Mac'],
            [8, 9, 10, 11, 12]
        ];
        foreach ($products as $product) {
            for ($i = 0; $i < count($propertyList); $i++) {
                ProductOption::create([
                    'name' => $propertyList[$i],
                    'value' => fake()->randomElement($propertyValues[$i]),
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
