<!-- @if($reservations->count() > 0)
<ul class="list-group">
    @foreach($reservations as $reservation)
    <li class="list-group-item">
        <span class="reservation-details">
            {{ $reservation->event->title }} - Datum: {{ $reservation->event->date }}
        </span>
        <a href="{{ route('download.tickets', $reservation->id) }}" class="btn btn-primary btn-sm float-end">Download Tickets</a>
    </li>
    @endforeach
</ul>
@else
<p>Geen reserveringen gevonden.</p>
@endif -->

@if($reservations->count() > 0)
<div class="reservation past-reservation scanned">
    <h3>{{ $reservation->event->title }}</h3>
    <p>{{ $reservation->event->title }}</p>
    <p>{{ $reservation->event->date }}</p>
    <span class="check">{{ $reservation->is_scanned ? '&#10004;' : '' }}</span>
</div>
@else
<p>geen reserveringen gevonden.</p>
@endif
