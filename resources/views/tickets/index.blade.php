@extends('layouts.app')

@section('content')
<div class="ticket-content">
    <form id="ticket-form" action="{{ route('ticket.store') }}" method="post">
        <div class="ticket-container">
            <img class="header-img pt-1" src="/storage/images/ticket.png" style="width: 100px; height: 100px;" alt="Header Image">
            <h2 class="ticket-title">Koop Ticket</h2>
            <p class="ticket-description">Vul de onderstaande informatie in om uw ticket te kopen.</p>

            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-input" required>

            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-input" required>

            <div class="form-input-container">
                <label for="ticket-quantity" class="form-label">Aantal Ticket</label>
                <div class="quantity-input">
                    <button onclick="decreaseTickets()" class="quantity-button btn btn-danger">-</button>
                    <input type="number" id="ticket-quantity" name="ticket-quantity" style="width: 50%;" class="form-input text-center" min="1" value="1" required>
                    <button onclick="increaseTickets()" class="quantity-button btn btn-primary  ">+</button>
                </div>
            </div>

            <label for="ticket-type" class="form-label">Ticket Type:</label>
            <select id="ticket-type" name="ticket-type" class="form-select" required>
                <option value="standard">Standard</option>
                <option value="vip">VIP</option>
            </select>

            <button type="button" class="form-button">Purchase Ticket</button>

        </div>
    </form>


</div>

<script>
    
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
</script>

@endsection