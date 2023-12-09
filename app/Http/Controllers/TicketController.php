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
            'ticket_type' => 'required|in:standard,vip'
        ]);

        $event = Event::Where('price');
        $ticket = new Ticket();

        $ticket->price = $event->price * $request->ticket_quantity;
        $ticket->type = $request->ticket_type;

        $ticket->save();
        return redirect()->route('home', $ticket, $event);
    }

    /**
     * Display the specified resource.
     */
    public function show(ticket $ticket)
    {
        //
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
}
