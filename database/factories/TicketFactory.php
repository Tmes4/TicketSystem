<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $event = Event::inRandomOrder()->first(); // Haal een willekeurig evenement op
        $eventDate = $event->date;
        $isFutureEvent = now()->lt($eventDate);
        return [
            'type' => $this->faker->randomElement(['Standard', 'VIP', 'Premium']),
            'price' => $event->price,
            'is_scanned' => $isFutureEvent ? false : $this->faker->boolean, // Gebruik de boolean methode om true of false te genereren
            'reservations_id' => function () {
                return \App\Models\Reservation::factory()->create()->id;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
