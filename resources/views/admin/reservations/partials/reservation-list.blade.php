<div class="container resve  py-2 fw-bold bg-white">
    <div class="row row-cols-6">
        <div class="col">Naam</div>
        <div class="col">EVENTS</div>
        <div class="col">Datum</div>
        <div class="col">plaats</div>
        <div class="col">STATUS</div>
    </div>
</div>
@foreach($reservations as $reservation)
<div class="container resve py-4 mt-3 bg-white">
    <div class="row row-cols- align-items-center">
        <div class="col d-flex align-items-center">
            <!-- <span><img class="custom-img-class rounded-pill me-3" src="" alt="" width="50" height="50"></span> -->
            <span class="fw-bold">{{ $reservation->user->name }}</span>
        </div>
        <div class="col d-flex align-items-center">
            <span><img class="custom-img-class rounded-pill me-3" src="{{ asset($reservation->event->imageUrl) }}" alt="" width="50" height="50"></span>
            <span class="">{{ $reservation->event->title }}</span>
        </div>
        <div class="col d-flex align-items-center">
            <span class="">{{ substr($reservation->event->date, 0, 2 ) }} {{ substr($reservation->event->month, 0, 3)}} {{ $reservation->event->time }}</span>
        </div>
        <div class="col d-flex align-items-center">
            <span class="">{{ $reservation->event->location }}</span>
        </div>
        <div class="col d-flex align-items-center">
            @foreach($reservation->tickets as $ticket)
            <form action="{{ route('tickets.update', $ticket) }}" method="POST">
                @csrf
                @method('PUT')

                <label class="toggle-switch">
                    <input type="checkbox" name="is_scanned" {{ $ticket->is_scanned ? 'checked' : '' }} onchange="this.form.submit()">
                    <span class="slider"></span>
                </label>

                <noscript>
                    <button type="submit">Save</button>
                </noscript>
            </form>

            <span class="">
                <!-- {{ $ticket->is_scanned ? 'Scanned' : 'Not Scanned' }} -->
            </span>
            @endforeach

        </div>



        <div class="col d-flex align-items-center justify-content-between"><span></span>
            <span class="d-flex align-items-center">
                <span class="me-1"><a href="" class="btn btn-outline-primary"><i class="fa-regular fa-pen-to-square"></i></a></span>
                <span>
                    <form action="{{ route('delete.reservation', $reservation) }}" method="POST">
                        <button type="submit" class="form-control btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </span>
            </span>
        </div>

    </div>
</div>
@endforeach
