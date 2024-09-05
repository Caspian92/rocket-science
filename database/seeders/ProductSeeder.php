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
        Product::factory(100)
            ->has(ProductOption::factory(rand(1, 3)), 'options')
            ->create();
    }
}
