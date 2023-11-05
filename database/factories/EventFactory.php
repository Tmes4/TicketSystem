<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

// @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {;
        // ABBAS
        $date = $this->faker->dateTimeBetween('-10 days', '+30 days', null);
        return [
            'title' => $this->faker->sentence(),
            'time' => $this->faker->time('H:i', '00:30'),
            'date' => $date,
            'location' => $this->faker->address(),
            'description' =>$this->faker->paragraph(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
