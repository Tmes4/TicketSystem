@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
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
                        <a href="#" class="btn btn-primary">Reserveren</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="script.js"></script>
@endsection