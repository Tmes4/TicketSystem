<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .ticket-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .ticket {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .ticket-details {
            margin-bottom: 15px;
        }

        p {
            margin: 5px 0;
        }

        span {
            font-weight: bold;
            margin-right: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="ticket-container">
        <div class="ticket">
            <h1>Ticket Details</h1>
            @foreach($tickets as $ticket)
            <div class="ticket-details">
                <p><span>Ticket Number:</span> {{ $ticket->id }}</p>
                <p><span>Event Name:</span> {{ $event->title }}</p>
                <p><span>Event Date:</span> {{ $event->date }}</p>
                <p><span>Event Time:</span> {{ $event->time }}</p>
                <p><span>Event Price:</span> {{ $event->price }}</p>
                <p><span>Event Location:</span> {{ $event->location }}</p>
            </div>
            @endforeach
            <div class="footer">
                <p>Thank you for using our service</p>
            </div>
        </div>
    </div>
</body>

</html>
