@extends('layouts.app')

@section('content')
<div class="">
    <div class="container py-4">
        <div class="d-flex align-items-center;" style="height: 10vh;">
            <div class="d-flex justify-content-between align-items-center w-100 mx-auto pb-3" style="max-width: 1320px;">
                <div class="align-items-center">
                    @if ($firstFutureReservation)
                    <h4 class="fw-bold mb-0">{{ $firstFutureReservation->event->title }}</h4>
                    <span class="text-center">
                        <p class="my-2">Het eerstvolgende gereserveerde evenement is <strong>{{ substr($firstFutureReservation->event->date, 0, 2) }} {{ $firstFutureReservation->event->month }} {{ substr($firstFutureReservation->event->date, 6, 7) }} </strong></p>
                        @else
                        <p class="my-2"><em>Geen toekomstige reserveringen gevonden.</em></p>
                    </span>
                    @endif
                </div>
                <a  href="{{ route('view.reservation') }}" class="btn rounded-0 btn-primary">Meer Info</a>
            </div>
        </div>
    </div>

    <div class="content px-5 py-3 border" style="background-color: #f3f4f7">
        <div class="container p-0 ">
            <!-- <a href="" class="btn bg-info">+ New Event Toevoegen</a> -->
            <div class="d-flex justify-content-between">
                <div class="" style="max-width: 540px;">
                    <h3 class="mb-3 border-bottom border-black fw-bolder mx-auto text-center pb-3">ExpiredReservations</h3>
                    @forelse($expiredReservations as $reservation)
                    @include('reservations.partials.reservation-list')
                    @empty
                    <p class="text-center">Geen reserveringen gevonden.</p>
                    @endforelse
                </div>
                <div class="" style="max-width: 540px;">
                    <h3 class="mb-3 border-bottom border-black fw-bolder mx-auto text-center pb-3">historicalReservations</h3>
                    @forelse($historicalReservations as $reservation)
                    @include('reservations.partials.reservation-list')
                        @empty
                    <p class="text-center">Geen reserveringen gevonden.</p>
                    @endforelse
                </div>


            </div>
        </div>
    </div>
    @endsection
