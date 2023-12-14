@extends('layouts.app')

@section('content')
<div class="ticket-content">

    <form action="{{ route('ticket.store', $event->id) }}" method="POST" style="min-width: 320px;" enctype="multipart/form-data">

        <h4 class="mb-5">Nieuw Ticket</h4>

        <div class="form-group">
            <label for="ticketQuantity">Aantal Ticket</label>
            <input type="number" id="ticketQuantity" name="ticketQuantity" class="form-control" >
        </div>
        <button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
        {{ csrf_field() }}
    </form>

</div>

<!-- <script>
    
    function increaseTickets() {
        let numberOfTickets = document.getElementById('ticket-quantity');
        numberOfTickets.value = parseInt(numberOfTickets.value) + 1;
    }

    function decreaseTickets() {
        let numberOfTickets = document.getElementById('ticket-quantity');
        if (parseInt(numberOfTickets.value) > 1) {
            numberOfTickets.value = parseInt(numberOfTickets.value) - 1;
        }
    }
</script> -->

@endsection