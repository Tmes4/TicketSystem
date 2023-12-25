@extends('layouts.App')

@section('content')
<div class="wrapper" style="background-color: #f3f4f7;">
    @include('admin.events.partials.sidebarNav')

    <div class="container pt-5" style="width:960px ;">
        <form action="{{ route('save.event') }}" method="POST" style="min-width: 320px;" enctype="multipart/form-data">

            <h4>Nieuw Event</h4>

            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" id="title" name="title" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="location">Locatie</label>
                <input type="text" id="location" name="location" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="time">Tijd</label>
                <input type="time" id="time" name="time" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="date">Datum</label>
                <input type="date" id="date" name="date" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="price">Prijs</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">&euro;</div>
                    </div>
                    <input type="number" min="0" id="price" name="price" class="form-control" value="">
                </div>
            </div>

            <div class="form-group">
                <label for="image"></label>
                <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/gif">
            </div>

            <div class="form-group">
                <label for="description">Beschrijving</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
            </div>

            <button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
            {{ csrf_field() }}
        </form>
    </div>
</div>
</div>

@endsection
