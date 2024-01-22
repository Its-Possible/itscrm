<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
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
            "name" => $this->faker->unique()->name,
            "description" => "Schedules from factories only testing code",
            "command" => "mail:campaigns",
            "schedule_at" => now()->addMinutes(10),
            'last_executed_at' => now(),
            "next_executed_at" => now()->addMinutes(20),
            "execution_interval" => 10
        ];
    }
}
