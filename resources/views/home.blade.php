@extends('layouts.app')

@section('content')
<!-- <img class="bg-img" src="" alt=""> -->
<div class="container">
    <h1 class="fw-bold">Upcoming Events </h1>
    <div class="row justify-content-between">
        @foreach($events as $event)


        <div class="card my-3 " style="width: 25rem; padding: 1px;">
            <img class="custom-img-class" src="{{ asset($event->imageUrl) }}" alt="" width="400" height="300">
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
            <div class="card-body">
                <a href="{{ route('show.event', $event->id) }}" class="btn btn-primary">Bekijken</a>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection