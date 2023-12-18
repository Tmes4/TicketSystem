<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $reservation; // Maak $reservation een openbare eigenschap
    public $event;

    /**
     * Create a new message instance.
     *
     * @param mixed $reservation
     * @param mixed $event
     */
    public function __construct($reservation, $event)
    {
        $this->reservation = $reservation;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reservation-confirmation')
            ->subject('Reservation Confirmation');
    }
}
