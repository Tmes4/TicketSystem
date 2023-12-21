<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $allowedUserIds = [1, 2]; 
        return [
            // 'user_id' => \App\Models\User::factory('user_id'), 
            'user_id' => $this->faker->randomElement($allowedUserIds), 
            'event_id' => \App\Models\Event::factory('event_id'), 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
