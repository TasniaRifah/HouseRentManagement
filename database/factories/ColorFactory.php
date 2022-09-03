<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ColorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'colorsname'=>$this->faker->unique()->word(),
            //   'identify_code'=>$this->faker->word(),
             
            //   'created_at'=>now(),
        ];
    }
}
