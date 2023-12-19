<!-- resources/views/events/show.blade.php -->

<h1>{{ $event->title }}</h1>

<p>{{ $event->description }}</p>

<h2>Bestelde Tickets</h2>
@if ($orderedTickets->isNotEmpty())
<ul>
    @foreach ($orderedTickets as $ticket)
    <li>Ticket ID: {{ $ticket->id }}, Prijs: {{ $ticket->price }}</li>
    @endforeach
</ul>
@else
<p>Geen bestelde tickets voor dit evenement.</p>
@endif