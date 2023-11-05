@extends('layouts.app')

@section('content')
<!-- ABBAS -->
<div class="container">
    <div class="row">
        @foreach($events as $event)
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card mb-5">
                <div class="card-body">
                    <h6 class="card-title fw-bold">{{ $event->title }}</h6>
                    <p class="card-text">{{ $event->date }}</p>
                    <p class="card-text">{{ $event->time }}</p>
                    <p class="card-text">{{ $event->location }}</p>
                    @if(strlen($event->description) > 100)
                    <p class="text">{{ substr($event->description, 0, 100) }} <a href="#" class="read-more-button"> Lees meer</a></p>
                    <p class="hidden-text d-none">{{ substr($event->description, 100) }}</p>
                    @else
                    <p class="text">{{ $event->description }}</p>
                    @endif
                    <a href="#" class="btn btn-primary">Reserveren</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection