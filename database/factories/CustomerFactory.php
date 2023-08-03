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
            'avatar' => $this->faker->imageUrl,
            'name' => encrypt_data($this->faker->name),
            'email' => encrypt_data($this->faker->unique()->email),
            'phone' => encrypt_data($this->faker->phoneNumber),
            'mobile' => encrypt_data($this->faker->phoneNumber),
            'birthday' => $this->faker->date,
            'vat' => encrypt_data($this->faker->numberBetween(100000000, 999999999))
        ];
    }
}
