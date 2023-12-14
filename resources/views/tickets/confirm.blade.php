@extends('layouts.app')  <!-- Zorg ervoor dat je de juiste layout gebruikt -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ticket Aankoop Bevestiging</div>
                    <div class="card-body">
                        @if(session('ticketQuantity'))
                            <div class="alert alert-success" role="alert">
                                {{ session('ticketQuantity') }} tickets zijn succesvol toegevoegd aan je reservering!
                            </div>
                        @endif

                        <!-- Hier kun je extra informatie of knoppen toevoegen, afhankelijk van je behoeften -->

                        <a href="{{ route('home') }}" class="btn btn-primary">Terug naar Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
