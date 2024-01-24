<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use App\Models\ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        // $event = Event::all();
        return view('tickets.index')
            ->with(compact('event'));
    }

    public function view(Reservation $reservation)
    {
        $allReservations = Reservation::orderBy('user_id', 'ASC')->get();
        $futureReservations = Reservation::upcoming()->get();
        $passReservations = Reservation::past()->get();
        // $upcomingReservations = Reservation::orderBy('user_id', 'ASC')->get();
        // $passReservations = Reservation::orderBy('created_at', 'ASC')->get();;
        return view('admin.reservations.viewReservations', compact('allReservations', 'futureReservations', 'passReservations'));
    }



    public function getAllReservations()
    {
        $allReservations = Reservation::orderBy('user_id', 'ASC')->get();
        return response()->json(['html' => view('admin.reservations.partials.reservation-list', ['reservations' => $allReservations])->render()]);
    }

    public function getfutureReservations()
    {
        $futureReservations = Reservation::upcoming()->get();
        return response()->json(['html' => view('admin.reservations.partials.reservation-list', ['reservations' => $futureReservations])->render()]);
    }

    public function getPassReservations()
    {
        $passReservations = Reservation::past()->orderBy('created_at', 'ASC')->get();
        return response()->json(['html' => view('admin.reservations.partials.reservation-list', ['reservations' => $passReservations])->render()]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {

        $this->validate($request, [
            'ticketQuantity' => 'required|numeric|min:1|max:5',
        ]);

        $user = User::with('reservations')->find(auth()->user()->id);

        // maak hier straks dat per persoon mag aantal keer resereveren zo lang hij niet de max ticket heeft bereikt

        if ($user->reservations()->where('event_id', $event->id)->count() < 1) {

            $curentCapacity = $event->reservations()->count();
            $ticketQuantity = $request->input('ticketQuantity');
            if (($curentCapacity + $ticketQuantity) <= $event->capacity) {

                $reservation = new Reservation();
                $reservation->user_id = $user->id;
                $reservation->event_id = $event->id;
                $reservation->save();

                for ($i = 0; $i < $ticketQuantity; $i++) {
                    $ticket = new Ticket();
                    $ticket->price = $event->price;
                    $ticket->reservations_id = $reservation->id;
                    $ticket->save();

                    $reservedTickets[] = $ticket;
                }
            } else {
                return redirect()->route('home')->with('error', 'Het evenement heeft niet genoeg capaciteit voor de geselecteerde tickets.');
            }

            // Mail::to(auth()->user()->email)->send(new ReservationConfirmation($reservation, $event));

            session()->put('reservedTickets', $reservedTickets);

            return redirect()->route('ticket.confirm')->with('ticketQuantity', $ticketQuantity);
        } else {
            return redirect()->route('home')->with('error', 'Je hebt al tickets gereserveerd voor dit evenement.');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        // $user = Auth::user();
        $user = User::with('reservations')->find(auth()->user()->id);

        $historicalReservations = $user->reservations()
            ->whereHas('tickets', function ($ticketQuery) {
                $ticketQuery->where('is_scanned', 1);
            })
            ->whereHas('event', function ($eventQuery) {
                $eventQuery->where('date', '<', now());
            })
            ->get();

        $expiredReservations = $user->reservations()
            ->whereHas('tickets', function ($ticketQuery) {
                $ticketQuery->where('is_scanned', 0);
            })
            ->whereHas('event', function ($eventQuery) {
                $eventQuery->where('date', '<', now());
            })
            ->get();

        $futureReservations = $user->reservations()
            ->whereHas('tickets', function ($ticketQuery) {
                $ticketQuery->where('is_scanned', 0);
            })
            ->whereHas('event', function ($eventQuery) {
                $eventQuery->where('date', '>', now());
            })
            ->get();

        $firstFutureReservation = $user->reservations()
            ->whereHas('tickets', function ($ticketQuery) {
                $ticketQuery->where('is_scanned', 0);
            })
            ->whereHas('event', function ($eventQuery) {
                $eventQuery->where('date', '>', now());
            })
            ->first();

        return view('reservations.index', compact('historicalReservations', 'expiredReservations', 'futureReservations', 'firstFutureReservation'));
    }

    public function viewReservations()
    {
        $user = User::with('reservations')->find(auth()->user()->id);
        $futureReservations = $user->reservations()
            ->whereHas('tickets', function ($ticketQuery) {
                $ticketQuery->where('is_scanned', 0);
            })
            ->whereHas('event', function ($eventQuery) {
                $eventQuery->where('date', '>', now());
            })
            // ->orderBy('date', 'ASC')
            ->get();
        return view('reservations.viewReservations', compact('futureReservations'));
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

    // public function downloadPdf($id)
    // {
    //     $reservation = Reservation::with('tickets', 'events');
    //     $ticketNumbers = $reservation->tickets->id;



    //     $pdf = PDF::loadView('reservations.pdf', ['tickets' => $reservation->tickets,  'events' => $reservation->events , 'ticketNumbers' => $ticketNumbers]);

    //     return $pdf->download('reservations.pdf');
    // }

    public function downloadPdf($id)
    {
        $reservation = Reservation::with(['tickets', 'event'])->findOrFail($id);
        $ticketNumbers = $reservation->tickets->pluck('id');

        $pdf = PDF::loadView('reservations.pdf', [
            'tickets' => $reservation->tickets,
            'ticketNumbers' => $ticketNumbers,
            'event' => $reservation->event // Voeg de evenementgegevens toe

        ]);

        return $pdf->download('reservations.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back();
    }
}
