@extends('layouts.app')

@section('content')

div class="container">
    <div class="row">
    @foreach($events as $event)
        <div class="card mb-3 px-0">
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
                        <a href="#" class="btn btn-primary">Bewerken</a>
                        <a href="#" class="btn btn-danger">Verwijderen</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

@endsection