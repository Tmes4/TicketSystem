@extends('layouts.app')
@section('content')
<div class="wrapper" style="background-color: #f3f4f7;">
    @include('admin.events.partials.sidebarNav')
    <div class="container resve py-4">
        <div class="event-content pt-2">
            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                <button class="custom-btn all-btn me-md-2 px-5 border border-dark rounded-pill" onclick="changeBackground('all-btn')" role="button">ALL EVENTS</button>
                <div>
                    <div class="slide-buttons d-grid gap-2">
                        <a href="#" class="custom-btn upcoming-btn rounded-pill" role="button" onclick="changeBackground('upcoming-btn')">Upcoming</a>
                        <a href="#" class="custom-btn pass-btn rounded-pill" role="button" onclick="changeBackground('pass-btn')">Pass</a>
                    </div>
                </div>
                <a href="{{ route('create.event') }}" class="btn btn-dark px-5 rounded-pill" type="button">New Event</a>
            </div>
            <div id="event-list-container" class="scrollable-view mt-4" >
                @include('admin.events.partials.event-list', ['events' => $allEvents])
            </div>

        </div>
    </div>
</div>
<script>
    function changeBackground(clickedButton) {
        // Verwijder de 'active' klasse van alle knoppen
        document.querySelectorAll('.custom-btn').forEach(btn => {
            btn.classList.remove('active');
        });

        // Voeg de 'active' klasse toe aan de geklikte knop
        document.querySelector(`.${clickedButton}`).classList.add('active');

        // Haal de evenementenlijst op via AJAX
        var url = '';
        if (clickedButton === 'all-btn') {
            url = '{{ route("getAllEvents") }}'
        } else if (clickedButton === 'upcoming-btn') {
            url = '{{ route("getUpcomingEvents") }}';
        } else if (clickedButton === 'pass-btn') {
            url = '{{ route("getPassEvents") }}';
        }

        // Doe een AJAX-verzoek naar de server
        fetch(url)
            .then(response => response.json())
            .then(data => {
                // Update de evenementenlijst
                document.getElementById('event-list-container').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }
</script>

</div>
</div> <!-- Don't delete this -->

@endsection
