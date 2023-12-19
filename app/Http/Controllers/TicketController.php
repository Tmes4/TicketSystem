<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservedTickets = Ticket::where('reservation_id');
        return view('tickets.confirm')
            ->with(compact('reservedTickets'));
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
    public function store(Request $request)
    {
        // Valideer het formuliergegevens
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'ticket_quantity' => 'required|integer|min:1',
        //     'ticket_type' => 'required|in:standard,vip',
        // ]);
        $this->validate(request(),[
            'ticket_quantity' => 'required|numeric|min:1',
        ]);

        $event = Event::Where('price');
        $ticket = new Ticket();

        $ticket->price = $request->ticket_quantity;

        $ticket->save();
        return redirect()->route('home', $ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(ticket $ticket, Event $event)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ticket $ticket)
    {
        //
    }

    public function download()
    {
        // Logica om tickets te downloaden

        // Bijvoorbeeld, een eenvoudige respons
        return response()->download(public_path('path/to/tickets.zip'));
    }
}
