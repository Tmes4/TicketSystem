@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
        <div class="card m-3 " style="width: 25rem; padding: 1px;">
            <!-- <img src="{{ $event->imageUrl }}" class="card-img-top" alt="..."> -->
            <div class="card-body">

                <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                @if(strlen($event->description) > 70)
                <p class="text">{{ substr($event->description, 0, 70) }} <a href="#" class="read-more-button"> Lees meer</a></p>
                <p class="hidden-text d-none">{{ substr($event->description, 70) }}</p>
                @else
                <p class="card-text">{{ $event->description }}</p>
                @endif
            </div>
            <ul class="list-group list-group-flush">
                <!-- <li class="list-group-item">{{ $event->time }}</li> -->
                <li class="list-group-item">{{ $event->date }}</li>
                <!-- <li class="list-group-item fw-2">{{ $event->location }}</li> -->
            </ul>
            <div class="card-body">
                <a href="{{ route('show.event', $event->id) }}" class="btn btn-primary">Bekijken</a>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
