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
            "name" => encrypt_data($this->faker->name),
            "email" => $this->faker->unique()->email,
            "phone" => encrypt_data($this->faker->phoneNumber),
            "city" => encrypt_data($this->faker->city),
            "country" => encrypt_data($this->faker->country),
            "zip" => encrypt_data($this->faker->postcode),
            "slug" => $this->faker->slug(),
        ];
    }
}
