@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> -->
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