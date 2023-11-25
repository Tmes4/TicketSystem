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
        // ABBAS
        // $this->faker->addProvider(new PicsumProvider($this->faker));
        $date = $this->faker->dateTimeBetween('-10 days', '+30 days', null);
        $titleWords = explode(' ', $this->faker->sentence());
        $title = implode(' ', array_slice($titleWords, 0, 2));
        return [
            'title' =>$title,
            'time' => $this->faker->time('H:i', '00:30'),
            'date' => $date,
            'location' => $this->faker->address(),
            'description' => $this->faker->paragraph(),
            // 'image' => $this->faker->PicsumProvider(400, 300),
            'imageUrl' => 'https://picsum.photos/seed/picsum/400/300',
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
