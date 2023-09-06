<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
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
            'code' => $this->faker->unique()->slug,
            'name' => $this->faker->name,
            'subject' => $this->faker->text,
            'previewText' => $this->faker->text,
            'htmlContent' => $this->faker->text
        ];
    }
}
