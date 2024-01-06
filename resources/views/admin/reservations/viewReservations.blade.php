@extends('layouts.app')
@section('content')
<div class="wrapper" style="background-color: #f3f4f7;">
    @include('admin.events.partials.sidebarNav')
    <div class="container py-5">
        <div class="event-content pt-2">
            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                <button class="custom-btn all-btn me-md-2 px-5 border border-dark rounded-pill" onclick="changeBackground('all-btn')" role="button">ALL Reservations</button>
                <div>
                    <div class="slide-buttons d-grid gap-2">
                        <a href="#" class="custom-btn upcoming-btn rounded-pill" role="button" onclick="changeBackground('upcoming-btn')">Upcoming</a>
                        <a href="#" class="custom-btn pass-btn rounded-pill" role="button" onclick="changeBackground('pass-btn')">Pass</a>
                    </div>
                </div>
                <a href="{{ route('create.reservation') }}" class="btn btn-dark px-5 rounded-pill" type="button">New Reservation</a>
            </div>
            <div id="reservation-list-container" class="scrollable-view mt-4">
                @include('admin.reservations.partials.reservation-list', ['reservations' => $allReservations])
            </div>
        </div>
    </div>
</div>
<script>
    function changeBackground(clickedButton) {
        document.querySelectorAll('.custom-btn').forEach(btn => {
            btn.classList.remove('active');
        });

        document.querySelector(`.${clickedButton}`).classList.add('active');

        var url = '';
        if (clickedButton === 'all-btn') {
            url = '{{ route("getAllReservations") }}';
        } else if (clickedButton === 'upcoming-btn') {
            url = '{{ route("getfutureReservations") }}';
        } else if (clickedButton === 'pass-btn') {
            url = '{{ route("getpassReservations") }}';
        }
        // console.log(url);
        fetch(url)
            .then(response => response.json())
            .then(data => {
                document.getElementById('reservation-list-container').innerHTML = data.html;
            })
            .catch(error => console.error('Error:', error));
    }
</script>



</div>
</div> <!-- Don't delete this -->

@endsection
