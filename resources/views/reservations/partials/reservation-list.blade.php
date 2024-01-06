<div class="card mb-3" >
    <div class="row g-0">
        <div class="col-md-4">
            <img class="img-fluid rounded-start" src="{{ asset($reservation->event->imageUrl) }}" alt="">
        </div>
        <div class="col-md-4 d-flex align-items-center">
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $reservation->event->title }}</strong></h5>
                <p class="card-text mb-0 "><i class="fa-solid fa-calendar-days"> {{ $reservation->event->date }} </i></p>
                @php
                $eventDate = \Carbon\Carbon::parse($reservation->event->date);
                @endphp
                @if ($eventDate->isPast())
                <p class="card-text"><small class="text-body-secondary">Het evenement vond plaats {{ $eventDate->diffForHumans() }}.</small></p>
                @else
                <p class="card-text"><small class="text-body-secondary">Het evenement vindt plaats over {{ $eventDate->diffForHumans(now()) }}.</small></p>
                @endif
            </div>
        </div>
        <div class="col-md-4 border-start">
            <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                <div>
                    <h3 class=""><strong>&euro;{{ $reservation->event->price }}</strong></h3>
                </div>
                <div> <a href="#" class="btn px-5" style="background-color: #14d75f;">Downlaod</a>
                </div>
            </div>
        </div>
    </div>
</div>
