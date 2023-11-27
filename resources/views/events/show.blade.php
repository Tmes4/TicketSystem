@extends('layouts.app')
@section('content')
<img src="{{ $event->imageUrl }}" class="card-img transparent-img" alt="...">
<div class="container py-5">
    <div class="row">
        <div class="title-text mb-5">
            <h3 class="mb-0 position-relative">evenementen</h3>
        </div>
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
                        <p class="card-text"><small class="text-body-secondary">{{ $event->location }}</small></p>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="card bg-f6f6f6" style="width: 50rem;">
            <div class="card-header">{{ $event->title }}</div>
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="card-body text-center" style="width: 5rem;">
                        <h5 class="card-title mb-0 fw-bolder">{{ $event->month}}</h5>
                        <h6 class="card-title fw-bolder mb-0 ">{{ substr($event->date, 0,2) }}</h6>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-body" style="width: 10rem;">
                        <h5 class="mb-0 d-flex fs-6">{{ substr($event->day, 0, 2)}}-{{ substr($event->time, 0, 5)}}</h5>
                        <h6 class="card-title mb-0 fs-6">{{ $event->location }}</h6>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card-body ">
                    <p class="mb-0">&euro; {{ $event->price }}</p>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="card-body ">
                    <a href="" class="btn btn-primary">Tickets</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
