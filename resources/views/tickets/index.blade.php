@extends('layouts.app')

@section('content')
<div class="ticket-content">

    <form action="{{ route('ticket.store', $event->id) }}" method="POST" style="min-width: 320px;" enctype="multipart/form-data">

        <h4 class="mb-5">Nieuw Ticket</h4>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title"  class="form-control" value="{{ $event->title }}" readonly >
        </div>
        <div class="form-group">
            <label for="location">Loactie</label>
            <input type="text" id="location" name="location"  value="{{ $event->location }}" class="form-control" >
        </div>
        <div class="form-group">
            <label for="ticketQuantity">Aantal Ticket</label>
            <input type="number" min="1" max="5"  id="ticketQuantity" name="ticketQuantity" class="form-control" >
        </div>
        <button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
        {{ csrf_field() }}
    </form>

</div>


@endsection
