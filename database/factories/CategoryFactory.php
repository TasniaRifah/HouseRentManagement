<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            Category::create([
                'categoriesname' => $this->faker->randomElement([
                    "Men",
                    "Women",

                ]),
                'is_active' => '1',
                'created_at' => now(),
            ]),
        ];
        //  return [
        //     "name" => $this->faker->name(),
        //     "email" => $this->faker->safeEmail,
        //     "mobile" => $this->faker->phoneNumber,
        //     "age" => $this->faker->numberBetween(25, 45),
        //     "gender" => $this->faker->randomElement([
        //         "male",
        //         "female",
        //         "others"
        //     ]),
        //     "address_info" => $this->faker->address
        // ];
    }
}
