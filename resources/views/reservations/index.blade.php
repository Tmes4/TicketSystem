@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="fw-bold">Mijn Reserveringen</h1>

        <div class="row mt-4">
            <div class="col-md-4">
                <h2>Historische Reserveringen</h2>
                @include('reservations.partials.reservation-list', ['reservations' => $historicalReservations])
            </div>

            <div class="col-md-4">
                <h2>Verlopen Reserveringen</h2>
                @include('reservations.partials.reservation-list', ['reservations' => $expiredReservations])
            </div>

            <div class="col-md-4">
                <h2>Toekomstige Reserveringen</h2>
                @include('reservations.partials.reservation-list', ['reservations' => $futureReservations])
            </div>
        </div>
    </div>
@endsection
