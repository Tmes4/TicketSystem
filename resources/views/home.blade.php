@extends('layouts.app')

@section('content')
<img class="bg-img" src="" alt="">
<div class="container">
    <h1 class="fw-bold">Upcoming Events </h1>
    <div class="row justify-content-between">
        @foreach($events as $event)
        <!-- <div class="card mb-3 px-0">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $event->imageUrl }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->location }}</p>
                        <p class="card-text"><small class="text-body-secondary">{{ $event->description }}</small></p>
                        <p class="card-text"><small class="text-body-secondary">{{ $event->time }}</small></p>
                        <p class="card-text"><small class="text-body-secondary">{{ $event->date }}</small></p>
                        <a href="#" class="btn btn-primary">Reserveren</a>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="card my-3 " style="width: 25rem; padding: 1px;">
            <img src="{{ $event->imageUrl }}?{{ $event->id }}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="d-flex align-items-center ">
                    <h6 class="card-title fw-bold d-flex flex-column mb-0">{{ strtoupper(substr($event->month, 0, 3)) }} <span class="fs-3">{{ substr($event->date, 0,2) }}</span></h6>
                    <h5 class="card-title fw-bold ms-5">{{ $event->title }}</h5>
                </div>
                <hr>
                @if(strlen($event->description) > 70)
                <p class="text mb-0 mt-3">{{ substr($event->description, 0, 70) }} <a href="#" class="read-more-button"> Lees meer</a></p>
                <p class="hidden-text d-none">{{ substr($event->description, 70) }}</p>
                @else
                <p class="card-text">{{ $event->description }}</p>
                @endif
            </div>
            <!-- <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $event->time }}</li>
                <li class="list-group-item">{{ $event->date }}</li>
                <li class="list-group-item fw-2">{{ $event->location }}</li>
            </ul> -->
            <div class="card-body">
                <a href="{{ route('show.event', $event->id) }}" class="btn btn-primary">Bekijken</a>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
