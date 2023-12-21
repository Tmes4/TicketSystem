<!-- resources/views/reservations/index.blade.php -->

@extends('layouts.app')

@section('content')

<div class="reservations-view">
    <h2 class="text-2xl font-bold mb-4">Reserveringen</h2>

    <table class="reservations-table">
        <thead>
            <tr>
                <th class="py-2">ID</th>
                <th class="py-2">Naam</th>
                <th class="py-2">Datum</th>
                <th class="py-2">Acties</th>
            </tr>
        </thead>
        <tbody>
            <!-- Voeg hier de lus toe om reserveringen weer te geven -->
            <tr class="historical scanned">
                <td>1</td>
                <td>John Doe</td>
                <td>2022-01-01</td>
                <td class="action-buttons">
                    <button class="rounded bg-blue-500">Bewerken</button>
                    <button class="rounded bg-red-500">Verwijderen</button>
                </td>
            </tr>
            <tr class="expired not-scanned">
                <td>2</td>
                <td>Jane Doe</td>
                <td>2023-01-01</td>
                <td class="action-buttons">
                    <button class="rounded bg-blue-500">Bewerken</button>
                    <button class="rounded bg-red-500">Verwijderen</button>
                </td>
            </tr>
            <tr class="future scanned">
                <td>3</td>
                <td>Bob Smith</td>
                <td>2024-01-01</td>
                <td class="action-buttons">
                    <button class="rounded bg-blue-500">Bewerken</button>
                    <button class="rounded bg-red-500">Verwijderen</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection