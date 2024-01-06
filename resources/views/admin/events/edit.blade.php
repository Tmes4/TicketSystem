@extends('layouts.App')

@section('content')
<div class="wrapper">
    @include('admin.events.partials.sidebarNav')
    <div class="new-container pt-5" style="max-width: 960px;">
        <form action="{{ route('update.event', $event) }}" method="POST" style="min-width: 320px;" enctype="multipart/form-data" class="new-form">
            @csrf
            @method('PUT')
            <h4 class="new-heading">Bewerk Event</h4>

            <div class="new-flex-container">
                <div class="new-form-group new-flex-item">
                    <label for="title">Titel</label>
                    <input type="text" id="title" name="title" class="new-input form-control" value="{{ old('title', $event->title) }}">
                </div>

                <div class="new-form-group new-flex-item">
                    <label for="location">Locatie</label>
                    <input type="text" id="location" name="location" class="new-input form-control" value="{{ old('location', $event->location) }}">
                </div>
            </div>

            <div class="new-flex-container">
                <div class="new-form-group new-flex-item">
                    <label for="time">Tijd</label>
                    <input type="time" id="time" name="time" class="new-input form-control" value="{{ old('time', $event->time) }}">
                </div>

                <div class="new-form-group new-flex-item">
                    <label for="date">Datum</label>
                    <input type="date" id="date" name="date" class="new-input form-control" value="{{ old('date', $event->date) }}">
                </div>
            </div>

            <div class="new-flex-container">
                <div class="new-form-group new-flex-item">
                    <label for="price">Prijs</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">&euro;</div>
                        </div>
                        <input type="number" min="0" id="price" name="price" class="new-input form-control" value="{{ old('price', $event->price) }}">
                    </div>
                </div>

                <div class="new-form-group new-flex-item">
                    <label for="image"></label>
                    <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/gif" class="new-file-input">
                </div>
            </div>

            <div class="new-form-group">
                <label for="description">Beschrijving</label>
                <textarea name="description" id="description" cols="30" rows="5" class="new-textarea form-control">{{ old('description', $event->description) }}</textarea>
            </div>

            <button type="submit" class="new-btn form-control btn btn-primary my-2">Opslaan</button>

        </form>
    </div>
</div>
@endsection
