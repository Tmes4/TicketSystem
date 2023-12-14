<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\ticket;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        return view('tickets.index')
            ->with(compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        $this->validate($request, [
            'ticketQuantity' => 'required|numeric|min:1',
        ]);
    
        $reservation = new Reservation();
        $reservation->user_id = auth()->user()->id;
        $reservation->event_id = $event->id;
        $reservation->save();
    
        $ticketQuantity = $request->input('ticketQuantity');
    
        for ($i = 0; $i < $ticketQuantity; $i++) {
            $ticket = new Ticket();
            $ticket->price = $event->price;
            $ticket->reservations_id = $reservation->id;
            $ticket->save();
        }
        
    
        return redirect()->route('ticket.confirm')->with('ticketQuantity', $ticketQuantity);
    }



    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation $reservation)
    {
        //
    }
}
