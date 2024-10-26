<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakerGr = \Faker\Factory::create('el_GR');

        return [
            'name' =>[
                'en' => fake()->name(),
               'gr'=> $fakerGr->name()
            ] ,
            'modelNumber' => $this->faker->unique()->numerify('MOD###'),
            'description' =>[
                'en' => fake()->sentence(),
                'gr'=> $fakerGr->sentence()
            ] ,
            'type' => [
                'en' => fake()->name(),
                'gr'=> $fakerGr->name()
            ] ,
            'newPrice' => $this->faker->numberBetween(100, 1000),
            'oldPrice' => $this->faker->numberBetween(50, 900),
        ];
    }
}
