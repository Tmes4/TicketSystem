@extends('layouts.app')

@section('content')

<p>Beste {{ auth()->user()->name }},</p>

    <p>Bedankt voor je reservering. Hier zijn de details van je gereserveerde tickets:</p>

    <ul>
        @foreach ($reservation->tickets as $ticket)
            <li>Ticket nummer: {{ $ticket->id }}, Prijs: {{ $ticket->price }}</li>
        @endforeach
    </ul>

    <p>Evenement: {{ $event->name }}</p>
    <p>Totaal aantal tickets: {{ $reservation->tickets->count() }}</p>
    <p>Totale prijs: {{ $reservation->tickets->sum('price') }}</p>

    <p>Bedankt voor je deelname aan ons evenement!</p>

    <p>Met vriendelijke groet,<br>
        Jouw Evenement Team
    </p>
@endsection
