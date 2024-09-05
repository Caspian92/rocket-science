<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $propertyList = ['Цвет', 'ОС', 'Версия'];
        $propertyValues = [
            ['Красный', 'Синий', 'Желтый', 'Зеленый'],
            ['iOS', 'Android', 'Mac'],
            [8, 9, 10, 11, 12]
        ];
        $propertyKey = rand(0, count($propertyList)-1);
        return [
            'name' => $propertyList[$propertyKey],
            'value' => fake()->randomElement($propertyValues[$propertyKey])
        ];
    }
}
