<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\reservation;
use Dompdf\Dompdf;
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
        $this->validate(request(), [
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
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'is_scanned' => 'boolean',
        ]);
        // dd($ticket->is_scanned);
        // $ticket->update(['is_scanned' => $request->input('is_scanned')]);
        $ticket->update(['is_scanned' => !$ticket->is_scanned]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ticket $ticket)
    {
        //
    }

    // TicketController.php

    public function changeScanStatus(Ticket $ticket)
    {
        $ticket->update(['is_scanned' => !$ticket->is_scanned]);

        return response()->json(['is_scanned' => $ticket->is_scanned]);
    }


    // public function download()
    // {
    //     // Logica om tickets te downloaden

    //     // Bijvoorbeeld, een eenvoudige respons
    //     return response()->download(public_path('path/to/tickets.zip'));
    // }

    // public function download($reservationId)
    // {
    //     $reservation = Reservation::findOrFail($reservationId);

    //     // View voor de PDF
    //     $html = view('pdf.tickets')->with('reservation', $reservation)->render();

    //     // Maak een nieuwe PDF-instantie aan
    //     $dompdf = new Dompdf();

    //     // Voeg de HTML-inhoud toe aan de PDF
    //     $dompdf->loadHtml($html);

    //     // Render de PDF
    //     $dompdf->render();

    //     // Download de PDF met een specifieke bestandsnaam
    //     return $dompdf->stream('ticket.pdf');
    // }
}
