@extends('layouts.app') <!-- Zorg ervoor dat je de juiste layout gebruikt -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">Ticket Aankoop Bevestiging</div>
                <div class="card-body">
                    @if(session('ticketQuantity'))
                    <div class="alert alert-success" role="alert">
                        {{ session('ticketQuantity') }} tickets zijn succesvol toegevoegd aan je reservering voor !
                    </div>
                    <p>Hier zijn uw gereserveerde ticketnummers:</p>
                    <ul class="list-group">
                        <ul class="list-group">
                            @foreach(session('reservedTickets') as $ticket)
                            <li class="list-group-item custom-list-item">
                                <span class="badge badge-success text-black">Ticket nummer: {{ $ticket->id }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        <!-- Hier kun je extra informatie of knoppen toevoegen, afhankelijk van je behoeften -->
                        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Terug naar Home</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
