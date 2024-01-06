<div class="container py-2 fw-bold bg-white">
    <div class="row row-cols-3">
        <div class="col">EVENTS NAME</div>
        <div class="col">DATE</div>
        <div class="col">LOCATION</div>
    </div>
</div>
@foreach($events as $event)
<div class="container resve py-4 mt-3 bg-white">
    <div class="row row-cols- align-items-center">
        <div class="col d-flex align-items-center">
            <span><img class="custom-img-class rounded-pill me-3" src="{{ asset($event->imageUrl) }}" alt="" width="50" height="50"></span>
            <span class="fw-bold">{{ $event->title }}</span>
        </div>
        <div class="col">{{ substr($event->date, 0, 2 ) }} {{ substr($event->month, 0, 3)}} {{ $event->time }}</div>
        <div class="col d-flex align-items-center justify-content-between"><span>{{ $event->location }}</span>
            <span class="d-flex align-items-center">
                <span class="me-1"><a href="{{ route('edit.event', $event) }}" class="btn btn-outline-primary"><i class="fa-regular fa-pen-to-square"></i></a></span>
                <span>
                    <form action="{{ route('delete.event', $event) }}" method="POST">
                        <button type="submit" class="form-control btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </span>
            </span>
        </div>
    </div>
</div>

@endforeach
