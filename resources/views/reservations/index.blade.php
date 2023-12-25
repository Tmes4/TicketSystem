<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

        header {
            background-color: #3498db;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
        }

        .sidebar {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            width: 200px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: white;
        }

        h1 {
            font-size: 2em;
            color: #3498db;
        }

        h2 {
            font-size: 1.5em;
            margin-top: 30px;
            color: #3498db;
        }

        .reservation-container {
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            gap: 20px;
        }

        .reservation {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            transition: transform 0.3s ease-in-out;
        }

        .past-reservation {
            border: 2px solid #bdc3c7;
        }

        .future-reservation {
            border: 2px solid #2ecc71;
        }

        .reservation:hover {
            transform: scale(1.05);
        }

        .reservation h3 {
            color: #3498db;
            margin-bottom: 10px;
        }

        .reservation p {
            margin: 8px 0;
        }

        .check {
            color: #2ecc71;
            font-size: 24px;
            margin-top: 10px;
        }

        .scanned .check {
            display: block;
        }

        .check {
            display: none;
        }
    </style>
</head>

<body>

    <header>
        <h1>Reserveringen</h1>
    </header>

    <div class="container">
        <div class="sidebar">
            <h2>Sidebar</h2>
            <!-- Voeg hier je zijbalkinhoud toe -->
        </div>

        <div class="main-content">
            <!-- Voeg hier je hoofdinhoud toe -->
            <h2>Hoofdinhoud</h2>
            <div class="reservation-container">
                <!-- Voeg hier je reserveringen toe -->
            </div>
        </div>
    </div>

</body>

</html>