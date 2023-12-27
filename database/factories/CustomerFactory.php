<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "name" => "Eduardo Bessa",
            "email" => $this->faker->unique()->email,
            "phone" => $this->faker->phoneNumber,
            "city" => $this->faker->city,
            "country" => $this->faker->country,
            "zip" => $this->faker->postcode,
            "slug" => $this->faker->slug()
        ];
    }
}
