@extends('layouts.app')

@section('content')
<div class="">
    <div class="container py-4">

    </div>

    <div class="content px-5 py-3 border" style="background-color: #f3f4f7">
        <div class="container p-0 ">
            <!-- <a href="" class="btn bg-info">+ New Event Toevoegen</a> -->
            <div class="d-flex justify-content-center">
                <div class="" style="max-width: 1000px;">
                    <h3 class="mb-3 border-bottom border-black fw-bolder mx-auto text-center pb-3">futureReservations</h3>
                    @forelse($futureReservations as $reservation)
                    @include('reservations.partials.reservation-list')
                    @empty
                    <p class="text-center">Geen reserveringen gevonden.</p>
                    @endforelse
                </div>



            </div>
        </div>
    </div>
    @endsection
