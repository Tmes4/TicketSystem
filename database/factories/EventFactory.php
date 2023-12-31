<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Smknstd\Faker\PicsumProvider;

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
        // $this->faker->addProvider(new PicsumProvider($this->faker));
        $date = $this->faker->dateTimeBetween('-10 days', '+30 days', null);
        $titleWords = explode(' ', $this->faker->sentence());
        $title = implode(' ', array_slice($titleWords, 0, 2));
        $tenMultiples = range(10, 100, 10);
        return [
            'title' =>$title,
            'time' => $this->faker->time('H:i', '00:30'),
            'date' => $date,
            'month' => $date->format('M'),
            'day' => $date->format('l'),
            'location' => $this->faker->randomElement(['Breda', 'Eindhoven', 'Tilburg', 'Den Bosch', 'Amsterdam', 'Rotterdam']),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomElement($tenMultiples),
            'imageUrl' => 'https://picsum.photos/400/300',
            'capacity' => $this->faker->randomElement(($tenMultiples)),
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
