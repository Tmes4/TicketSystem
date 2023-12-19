@if($reservations->count() > 0)
    <ul class="list-group">
        @foreach($reservations as $reservation)
            <li class="list-group-item">
                {{ $reservation->event->title }} - Datum: {{ $reservation->event->date }}
                <a href="{{ route('download.tickets', $reservation->id) }}" class="btn btn-primary btn-sm float-end">Download Tickets</a>
            </li>
        @endforeach
    </ul>
@else
    <p>Geen reserveringen gevonden.</p>
@endif
